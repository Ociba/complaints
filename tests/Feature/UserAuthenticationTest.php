<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class UserAuthenticationTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    protected $userData;

    protected function setUp(): void
    {
        parent::setUp();

        $this->userData = [
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'password' => 'Password123!',
            'password_confirmation' => 'Password123!',
            'country' => 'US'
        ];
    }

    public function test_user_registration()
    {
        $response = $this->postJson('/api/v1/auth/register', $this->userData);

        $response->assertStatus(201)
            ->assertJsonStructure([
                'success',
                'access_token',
                'token_type',
                'expires_in',
                'user' => [
                    'id',
                    'name',
                    'email',
                    'country'
                ],
                'message'
            ]);
    }

    public function test_user_registration_validation()
    {
        $response = $this->postJson('/api/v1/auth/register', []);

        $response->assertStatus(422)
            ->assertJsonValidationErrors(['name', 'email', 'password', 'country']);
    }

    public function test_user_login()
    {
        $user = User::factory()->create([
            'email' => $this->userData['email'],
            'password' => bcrypt($this->userData['password'])
        ]);

        $response = $this->postJson('/api/v1/auth/login', [
            'email' => $this->userData['email'],
            'password' => $this->userData['password']
        ]);

        $response->assertStatus(200)
            ->assertJsonStructure([
                'success',
                'access_token',
                'token_type',
                'expires_in',
                'user',
                'message'
            ]);
    }

    public function test_invalid_login_credentials()
    {
        $response = $this->postJson('/api/v1/auth/login', [
            'email' => 'nonexistent@example.com',
            'password' => 'wrongpassword'
        ]);

        $response->assertStatus(401)
            ->assertJson([
                'success' => false,
                'message' => 'Invalid credentials'
            ]);
    }

    public function test_get_authenticated_user()
    {
        $user = User::factory()->create();
        Sanctum::actingAs($user);

        $response = $this->withHeaders([
            'Accept' => 'application/json',
        ])->getJson('/api/v1/auth/me');

        $response->assertStatus(200)
            ->assertJson([
                'success' => true,
                'user' => [
                    'id' => $user->id,
                    'email' => $user->email
                ]
            ]);
    }

    public function test_user_logout()
    {
        $user = User::factory()->create();
        Sanctum::actingAs($user);

        $response = $this->withHeaders([
            'Accept' => 'application/json',
        ])->postJson('/api/v1/auth/logout');

        $response->assertStatus(200)
            ->assertJson([
                'success' => true,
                'message' => 'Successfully logged out'
            ]);

        // Verify token is invalidated
        $response = $this->getJson('/api/v1/auth/me');
        $response->assertStatus(401);
    }
}
