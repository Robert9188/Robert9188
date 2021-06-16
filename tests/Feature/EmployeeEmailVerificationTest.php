<?php

namespace Tests\Feature;

use App\Models\Employee;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Verified;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\URL;
use Tests\TestCase;

class EmployeeEmailVerificationTest extends TestCase
{
    use RefreshDatabase;

    public function test_email_verification_screen_can_be_rendered()
    {
        $employee = Employee::factory()->create([
            'email_verified_at' => null,
        ]);

        $response = $this->actingAs($employee, 'employee')->get('employee/verify-email');

        $response->assertStatus(200);
    }

    public function test_email_can_be_verified()
    {
        Event::fake();

        $employee = Employee::factory()->create([
            'email_verified_at' => null,
        ]);

        $verificationUrl = URL::temporarySignedRoute(
            'employee.verification.verify',
            now()->addMinutes(60),
            ['id' => $employee->id, 'hash' => sha1($employee->email)]
        );

        $response = $this->actingAs($employee, 'employee')->get($verificationUrl);

        Event::assertDispatched(Verified::class);
        $this->assertTrue($employee->fresh()->hasVerifiedEmail());
        $response->assertRedirect(route('employee.dashboard').'?verified=1');
    }

    public function test_email_is_not_verified_with_invalid_hash()
    {
        $employee = Employee::factory()->create([
            'email_verified_at' => null,
        ]);

        $verificationUrl = URL::temporarySignedRoute(
            'employee.verification.verify',
            now()->addMinutes(60),
            ['id' => $employee->id, 'hash' => sha1('wrong-email')]
        );

        $this->actingAs($employee, 'employee')->get($verificationUrl);

        $this->assertFalse($employee->fresh()->hasVerifiedEmail());
    }
}
