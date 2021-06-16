<?php

namespace Tests\Feature;

use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class EmployeeRegistrationTest extends TestCase
{
    use RefreshDatabase;

    public function test_registration_screen_can_be_rendered()
    {
        $response = $this->get('employee/register');

        $response->assertStatus(200);
    }

    public function test_new_employees_can_register()
    {
        $response = $this->post('employee/register', [
            'name' => 'Test Employee',
            'email' => 'test@example.com',
            'password' => 'password',
            'password_confirmation' => 'password',
        ]);

        $this->assertAuthenticated('employee');
        $response->assertRedirect(route('employee.dashboard'));
    }
}
