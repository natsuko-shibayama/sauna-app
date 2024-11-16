<?php

namespace Tests\Feature\Auth;

use App\Models\Admin;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class PasswordUpdateTest extends TestCase
{
    use RefreshDatabase;

    public function test_password_can_be_updated(): void
    {
         /** @var \App\Models\Admin $admin */
        $admin = Admin::factory()->create();

        $response = $this
            ->actingAs($admin)
            ->from('/profile')
            ->put('/password', [
                'current_password' => 'password',
                'password' => 'new-password',
                'password_confirmation' => 'new-password',
            ]);

        $response
            ->assertSessionHasNoErrors()
            ->assertRedirect('/profile');

        $this->assertTrue(Hash::check('new-password', $admin->refresh()->password));
    }

    public function test_correct_password_must_be_provided_to_update_password(): void
    {
        /** 下記の記載で、$adminの型を明示的に指定し、intelephenseが正しく型を認識する*/
         /** @var \App\Models\Admin $admin */
        $admin = Admin::factory()->create();

        $response = $this
            ->actingAs($admin)
            ->from('/profile')
            ->put('/password', [
                'current_password' => 'wrong-password',
                'password' => 'new-password',
                'password_confirmation' => 'new-password',
            ]);

        $response
            ->assertSessionHasErrorsIn('updatePassword', 'current_password')
            ->assertRedirect('/profile');
    }
}
