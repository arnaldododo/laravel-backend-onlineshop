<?php

namespace Tests\Feature;

use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RegistrationTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    use RefreshDatabase;

    public function testUserCanLandOnRegisterPage()
    {
        $response = $this->get('/register');

        $response->assertStatus(200);
    }

    public function testUserCanRegisterAsANewUser()
    {
        $response = $this->post('/register', [
            'name' => 'User Test',
            'email' => 'test@email.com',
            'password' => 'password',
            'password_confirmation' => 'password'
        ]);

        $this->assertAuthenticated();
        $response->assertRedirect(RouteServiceProvider::HOME);
    }
}
