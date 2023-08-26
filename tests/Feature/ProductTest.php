<?php

namespace Tests\Feature;

use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProductTest extends TestCase
{
    public function test_product_page_contains_empty_products(): void
    {
        $response = $this->get('/products');

        $response->assertStatus(200);
        $response->assertSee(' No Product Found..');
    }

    public function test_product_page_has_atleast_one_product(): void
    {
        Product::create([
            'name' => 'Test Product',
            'price' => 1121,    
        ]);
        $response = $this->get('/products');

        $response->assertStatus(200);
        $response->assertDontSee('No Product Found..');
    }
}
