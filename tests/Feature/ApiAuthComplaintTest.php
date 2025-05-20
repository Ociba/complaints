<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class ApiAuthComplaintTest extends TestCase
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

//    #[Test]
//    public function user_can_register()
//    {
//        $response = $this->postJson('/api/auth/register', $this->userData);
//
//        $response->assertStatus(201)
//            ->assertJsonStructure([
//                'access_token',
//                'token_type',
//                'user' => [
//                    'id',
//                    'name',
//                    'email',
//                    'country'
//                ]
//            ]);
//
//        $this->assertDatabaseHas('users', [
//            'email' => $this->userData['email']
//        ]);
//    }
//
//    #[Test]
//    public function registration_requires_valid_data()
//    {
//        $response = $this->postJson('/api/auth/register', []);
//
//        $response->assertStatus(422)
//            ->assertJsonValidationErrors([
//                'name', 'email', 'password', 'country'
//            ]);
//    }
//
//    #[Test]
//    public function user_can_login()
//    {
//        User::factory()->create([
//            'email' => $this->userData['email'],
//            'password' => bcrypt($this->userData['password'])
//        ]);
//
//        $response = $this->postJson('/api/auth/login', [
//            'email' => $this->userData['email'],
//            'password' => $this->userData['password']
//        ]);
//
//        $response->assertStatus(200)
//            ->assertJsonStructure(['access_token']);
//    }
//
//    #[Test]
//    public function login_fails_with_invalid_credentials()
//    {
//        $response = $this->postJson('/api/auth/login', [
//            'email' => 'nonexistent@example.com',
//            'password' => 'wrongpassword'
//        ]);
//
//        $response->assertStatus(401)
//            ->assertJson(['message' => 'Invalid credentials']);
//    }
//
//    #[Test]
//    public function authenticated_user_can_get_their_profile()
//    {
//        $user = User::factory()->create();
//        $token = $user->createToken('test-token')->plainTextToken;
//
//        $response = $this->withHeaders([
//            'Authorization' => 'Bearer ' . $token,
//            'Accept' => 'application/json'
//        ])->getJson('/api/auth/me');
//
//        $response->assertStatus(200)
//            ->assertJson([
//                'id' => $user->id,
//                'email' => $user->email
//            ]);
//    }
//
//    #[Test]
//    public function user_can_logout()
//    {
//        $user = User::factory()->create();
//        $token = $user->createToken('test-token')->plainTextToken;
//
//        $response = $this->withHeaders([
//            'Authorization' => 'Bearer ' . $token,
//            'Accept' => 'application/json'
//        ])->postJson('/api/auth/logout');
//
//        $response->assertStatus(200)
//            ->assertJson(['message' => 'Successfully logged out']);
//    }
}
