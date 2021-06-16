<?php

namespace Tests\Feature;

use App\Models\Employee;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class EmployeeAuthenticationTest extends TestCase
{
    use RefreshDatabase;

    public function test_login_screen_can_be_rendered()
    {
        $response = $this->get('employee/login');

        $response->assertStatus(200);
    }

    public function test_employees_can_authenticate_using_the_login_screen()
    {
        $employee = Employee::factory()->create();

        $response = $this->post('employee/login', [
            'email' => $employee->email,
            'password' => 'password',
        ]);

        $this->assertAuthenticated('employee');
        $response->assertRedirect(route('employee.dashboard'));
    }

    public function test_employees_can_not_authenticate_with_invalid_password()
    {
        $employee = Employee::factory()->create();

        $this->post('employee/login', [
            'email' => $employee->email,
            'password' => 'wrong-password',
        ]);

        $this->assertGuest('employee');
    }
}
