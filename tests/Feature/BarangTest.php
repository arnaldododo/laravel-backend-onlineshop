<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\User;
use App\Product;

class BarangTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    use RefreshDatabase;

    public function testAuthenticatedUserCanViewBarangPage()
    {
        $user = factory(User::class)->create();
        $response = $this->actingAs($user)->get('/products');
        $response->assertStatus(200);
    }

    public function testAuthenticatedUserCanViewTambahBarangForm()
    {
        $user = factory(User::class)->create();
        $response = $this->actingAs($user)->get('/products/create');
        $response->assertStatus(200);
    }

    public function testAuthenticatedUserCanViewEditBarangForm()
    {
        $user = factory(User::class)->create();
        $product = factory(Product::class)->create();
        $response = $this->actingAs($user)->get('/products/' . $product->id . '/edit');
        $response->assertStatus(200);
    }

    public function testUnauthenticatedUserCannotViewTambahBarangForm()
    {
        $response = $this->get('/products');
        $response->assertStatus(302);
        $response->assertRedirect('/login');
    }

    public function testUserCanAddNewBarang()
    {
        $user = factory(User::class)->create();
        $response = $this->actingAs($user)->post('products', [
            'name' => 'Product Test',
            'slug' => 'product-test',
            'type' => 'Type Test',
            'description' => 'Description Test',
            'price' => '1000',
            'quantity' => '2'
        ]);
        $response->assertSessionHasNoErrors();
        $response->assertRedirect('/products');
        $this->assertCount(1, Product::all());
        $this->assertDatabaseHas('products', [
            'name' => 'Product Test',
            'type' => 'Type Test',
            'description' => 'Description Test',
            'price' => '1000',
            'quantity' => '2'
        ]);
    }

    public function testUserCanEditExistingBarang()
    {
        $user = factory(User::class)->create();
        factory(Product::class)->create();
        $this->assertCount(1, Product::all());
        $product = Product::first();
        $response = $this->actingAs($user)->put('/products/' . $product->id, [
            'name' => 'Updated Product Test',
            'slug' => 'updated-product-test',
            'type' => 'Updated Type Test',
            'description' => 'Updated Description Test',
            'price' => '2000',
            'quantity' => '5'
        ]);
        $response->assertSessionHasNoErrors();
        $response->assertRedirect('/products');
        $this->assertEquals('Updated Product Test', Product::first()->name);
        $this->assertEquals('updated-product-test', Product::first()->slug);
        $this->assertEquals('Updated Type Test', Product::first()->type);
        $this->assertEquals('Updated Description Test', Product::first()->description);
        $this->assertEquals('2000', Product::first()->price);
        $this->assertEquals('5', Product::first()->quantity);
    }

    public function testUserCanDeleteBarang()
    {
        $user = factory(User::class)->create();
        $product = factory(Product::class)->create();
        $this->assertEquals(1, Product::count());
        $response = $this->actingAs($user)->delete('/products/' . $product->id);
        $response->assertStatus(302);
        $this->assertEquals(0, Product::count());
    }
}
