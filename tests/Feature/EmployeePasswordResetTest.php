<?php

namespace Tests\Feature;

use App\Models\Employee;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Notification;
use Tests\TestCase;

class EmployeePasswordResetTest extends TestCase
{
    use RefreshDatabase;

    public function test_reset_password_link_screen_can_be_rendered()
    {
        $response = $this->get('employee/forgot-password');

        $response->assertStatus(200);
    }

    public function test_reset_password_link_can_be_requested()
    {
        Notification::fake();

        $employee = Employee::factory()->create();

        $response = $this->post('employee/forgot-password', [
            'email' => $employee->email,
        ]);

        Notification::assertSentTo($employee, ResetPassword::class);
    }

    public function test_reset_password_screen_can_be_rendered()
    {
        Notification::fake();

        $employee = Employee::factory()->create();

        $response = $this->post('employee/forgot-password', [
            'email' => $employee->email,
        ]);

        Notification::assertSentTo($employee, ResetPassword::class, function ($notification) {
            $response = $this->get('employee/reset-password/'.$notification->token);

            $response->assertStatus(200);

            return true;
        });
    }

    public function test_password_can_be_reset_with_valid_token()
    {
        Notification::fake();

        $employee = Employee::factory()->create();

        $response = $this->post('employee/forgot-password', [
            'email' => $employee->email,
        ]);

        Notification::assertSentTo($employee, ResetPassword::class, function ($notification) use ($employee) {
            $response = $this->post('employee/reset-password', [
                'token' => $notification->token,
                'email' => $employee->email,
                'password' => 'password',
                'password_confirmation' => 'password',
            ]);

            $response->assertSessionHasNoErrors();

            return true;
        });
    }
}
