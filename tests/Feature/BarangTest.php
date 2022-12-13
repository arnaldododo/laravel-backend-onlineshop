<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\User;

class BarangTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    use RefreshDatabase;

    public function testAuthenticatedUserCanViewTambahBarangForm()
    {
        $user = factory(User::class)->create();
        $response = $this->actingAs($user)->get('/products');
        $response->assertStatus(200);
    }
    public function testUnauthenticatedUserCannotViewTambahBarangForm()
    {
        $response = $this->get('/products');
        $response->assertStatus(302);
        $response->assertRedirect('/login');
    }
}
