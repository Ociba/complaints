<?php

namespace Tests\Feature;

use App\Models\Complaint;
use App\Models\Payment;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class ComplaintsTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    protected $user;
    protected $token;
    protected $headers;

    protected function setUp(): void
    {
        parent::setUp();

        $this->user = User::factory()->create();
        $this->token = $this->user->createToken('test-token')->plainTextToken;
        $this->headers = [
            'Authorization' => 'Bearer ' . $this->token,
            'Accept' => 'application/json'
        ];
    }

//    #[Test]
//    public function user_can_create_complaint_with_valid_payment()
//    {
//        $payment = Payment::factory()->create(['user_id' => $this->user->id]);
//
//        $complaintData = [
//            'title' => 'Test Complaint',
//            'description' => 'Test description',
//            'payment_id' => $payment->id
//        ];
//
//        $response = $this->withHeaders($this->headers)
//            ->postJson('/api/complaints', $complaintData);
//
//        $response->assertStatus(201)
//            ->assertJsonStructure([
//                'data' => [
//                    'id',
//                    'user_id',
//                    'payment_id',
//                    'title',
//                    'description',
//                    'status',
//                    'created_at'
//                ]
//            ]);
//
//        $this->assertDatabaseHas('complaints', [
//            'user_id' => $this->user->id,
//            'payment_id' => $payment->id
//        ]);
//    }
//
//    #[Test]
//    public function cannot_create_complaint_without_payment()
//    {
//        $response = $this->withHeaders($this->headers)
//            ->postJson('/api/complaints', [
//                'title' => 'Test',
//                'description' => 'Test'
//            ]);
//
//        $response->assertStatus(403)
//            ->assertJson(['message' => 'User has no payments. Please create a payment first.']);
//    }
//
//    #[Test]
//    public function cannot_create_complaint_with_other_users_payment()
//    {
//        $otherUser = User::factory()->create();
//        $payment = Payment::factory()->create(['user_id' => $otherUser->id]);
//
//        $response = $this->withHeaders($this->headers)
//            ->postJson('/api/complaints', [
//                'title' => 'Test',
//                'description' => 'Test',
//                'payment_id' => $payment->id
//            ]);
//
//        $response->assertStatus(403)
//            ->assertJson(['message' => 'Payment not found for this user']);
//    }
//
//    #[Test]
//    public function user_can_view_their_complaints()
//    {
//        Complaint::factory()->count(3)->create(['user_id' => $this->user->id]);
//
//        $response = $this->withHeaders($this->headers)
//            ->getJson('/api/complaints');
//
//        $response->assertStatus(200)
//            ->assertJsonCount(3)
//            ->assertJsonStructure([
//                '*' => ['id', 'title', 'status', 'created_at']
//            ]);
//    }
//
//    #[Test]
//    public function user_can_view_single_complaint()
//    {
//        $complaint = Complaint::factory()->create(['user_id' => $this->user->id]);
//
//        $response = $this->withHeaders($this->headers)
//            ->getJson("/api/complaints/{$complaint->id}");
//
//        $response->assertStatus(200)
//            ->assertJson([
//                'data' => [
//                    'id' => $complaint->id,
//                    'title' => $complaint->title
//                ]
//            ]);
//    }
//
//    #[Test]
//    public function user_can_update_their_complaint()
//    {
//        $complaint = Complaint::factory()->create([
//            'user_id' => $this->user->id,
//            'status' => 'pending'
//        ]);
//
//        $response = $this->withHeaders($this->headers)
//            ->putJson("/api/complaints/{$complaint->id}", [
//                'title' => 'Updated Title',
//                'status' => 'processing'
//            ]);
//
//        $response->assertStatus(200)
//            ->assertJson([
//                'data' => [
//                    'title' => 'Updated Title',
//                    'status' => 'processing'
//                ]
//            ]);
//    }
//
//    #[Test]
//    public function user_can_delete_their_complaint()
//    {
//        $complaint = Complaint::factory()->create(['user_id' => $this->user->id]);
//
//        $response = $this->withHeaders($this->headers)
//            ->deleteJson("/api/complaints/{$complaint->id}");
//
//        $response->assertStatus(200)
//            ->assertJson(['message' => 'Complaint deleted successfully']);
//
//        $this->assertDatabaseMissing('complaints', ['id' => $complaint->id]);
//    }
//
//    #[Test]
//    public function cannot_access_other_users_complaints()
//    {
//        $otherUser = User::factory()->create();
//        $complaint = Complaint::factory()->create(['user_id' => $otherUser->id]);
//
//        // Test show
//        $response = $this->withHeaders($this->headers)
//            ->getJson("/api/complaints/{$complaint->id}");
//        $response->assertStatus(403);
//
//        // Test update
//        $response = $this->withHeaders($this->headers)
//            ->putJson("/api/complaints/{$complaint->id}", ['title' => 'Updated']);
//        $response->assertStatus(403);
//
//        // Test delete
//        $response = $this->withHeaders($this->headers)
//            ->deleteJson("/api/complaints/{$complaint->id}");
//        $response->assertStatus(403);
//    }
}
