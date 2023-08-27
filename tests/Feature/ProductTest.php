<?php

namespace Tests\Feature;

use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProductTest extends TestCase
{
    use RefreshDatabase; //Use it carefully if you uses main database it will delete your all data,for that unable         
//    In phpunit.xml
    // <env name="DB_CONNECTION" value="sqlite"/>
    // <env name="DB_DATABASE" value=":memory:"/>
    public function test_product_page_contains_empty_products(): void
    {
        $response = $this->get('/products');

        $response->assertStatus(200);
        $response->assertSee(' No Product Found..');
    }

    public function test_product_page_has_atleast_one_product(): void
    {
        $product = Product::create([
            'name' => 'Test Product',
            'price' => 1121,    
        ]);
        $response = $this->get('/products');

        $response->assertStatus(200);
        $response->assertDontSee('No Product Found..');
        $response->assertSee('Test Product');
        $response->assertViewHas('products', function($collection) use ($product){
            return $collection->contains($product);
        });
    }
}
