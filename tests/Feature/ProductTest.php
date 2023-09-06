<?php

namespace Tests\Feature;

use App\Models\Product;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProductTest extends TestCase
{
    use RefreshDatabase; //Use it carefully if you uses main database it will delete your all data,for that unable         
//    In phpunit.xml
    // <env name="DB_CONNECTION" value="sqlite"/>
    // <env name="DB_DATABASE" value=":memory:"/>
    private User $user;
    private User $admin;
    
    protected function setUp(): void  //It works as a constructor in test
    {
        parent::setUp();
        $this->user = $this->createUser();
        $this->admin = $this->createUser(isAdmin: true);
    }
    public function test_product_page_contains_empty_products(): void
    {
        $response = $this->actingAs($this->user)->get('/products');

        $response->assertStatus(200);
        $response->assertSee(' No Product Found..');
    }

    public function test_product_page_has_atleast_one_product(): void
    {
        $product = Product::create([
            'name' => 'Test Product',
            'price' => 1121,    
        ]);

        $response = $this->actingAs($this->user)->get('/products');

        $response->assertStatus(200);
        $response->assertDontSee('No Product Found..');
        $response->assertSee('Test Product');
        $response->assertViewHas('products', function($collection) use ($product){
            return $collection->contains($product);
        });
    }

    public function test_paginated_products_table_doesnt_contain_10th_record()
    {

        // $product = Product::all();
        $product = Product::factory(10)->create([
            'price' => rand(100,999),
        ]);
        $lastProduct = $product->last();
        // for($i = 1; $i<=11; $i++)
        // {
        //     $product = Product::create([
        //         'name' => 'Product'. $i,
        //         'price' => rand(100,999),
        //     ]);
        // }
        $response = $this->actingAs($this->user)->get('products');
        $response->assertStatus(200);
        $response->assertViewHas('products', function ($collection) use ($lastProduct){
            return !$collection->contains($lastProduct);
        });
    }
    public function test_admin_can_see_products_create_button()
    {
        $response = $this->actingAs($this->admin)->get('/products');   

        $response->assertStatus(200);
        $response->assertSee('Create New Product');
    }

    public function test_non_admin_cannot_see_products_create_button()
    {
        $response = $this->actingAs($this->user)->get('/products');

        $response->assertStatus(200);
        $response->assertDontSee('Create New Product');
    }

    public function test_admin_user_can_access_product_create_page()
    {
        $response = $this->actingAs($this->admin)->get('products/create');
        $response->assertStatus(200);
    }

    public function test_non_admin_users_cannot_access_product_create_page()
    {
        $response = $this->actingAs($this->user)->get('products/create');
        $response->assertStatus(403);
    }

    private function createUser(bool $isAdmin= false): User
    {
        return User::factory()->create([
            'is_admin' => $isAdmin,
        ]);
    }
}
