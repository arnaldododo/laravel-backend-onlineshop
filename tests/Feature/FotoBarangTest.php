<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\User;

class FotoBarangTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    use RefreshDatabase;

    public function testAuthenticatedUserCanViewFotoBarangForm()
    {
        $user = factory(User::class)->create();
        $response = $this->actingAs($user)->get('/product-galleries');
        $response->assertStatus(200);
    }
    public function testUnauthenticatedUserCannotViewTambahFotoBarangForm()
    {
        $response = $this->get('/product-galleries');
        $response->assertStatus(302);
        $response->assertRedirect('/login');
    }
}
