<?php

namespace Tests\Feature\Auth;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class EmailVerificationTest extends TestCase
{
    use RefreshDatabase;

    public function test_email_verification_screen_cannot_be_rendered(): void
    {
        $user = User::factory()->create([
            'email_verified_at' => null,
        ]);

        // Attempt to access email verification screen should redirect to another page or return 404
        $response = $this->actingAs($user)->get('/verify-email');

        $response->assertStatus(404);
        // or assert redirection to another page if applicable
    }

    public function test_email_verification_is_not_required(): void
    {
        $user = User::factory()->create([
            'email_verified_at' => null,
        ]);

        // Attempt to verify email should not affect the user's verified status
        $response = $this->actingAs($user)->get(route('verification.verify', [
            'id' => $user->id,
            'hash' => sha1('any-string-here'), // Using a dummy hash since verification is disabled
        ]));

        $this->assertFalse($user->fresh()->hasVerifiedEmail());
        // Assert redirection or any other expected behavior
    }
}
