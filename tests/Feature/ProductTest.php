<?php

namespace Tests\Feature;

use App\Models\Product;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProductTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function visitor_can_able_to_view_product_list()
    {
        // Arrange / Preperation / prepare   
        $product = Product::factory()->count(10)->create();
        // dd($product);
        // Act / Action / perform
        $response = $this->get('api/product/list');

        // Assertion  / perdict
        $response->assertStatus(200);
        // $response->assertSee('This is a product title');
    }
    /** @test  */
    public function visitor_can_able_to_view_a_product()
    {
        // Arrange / Preperation / prepare   
        $product = Product::create([
            'name' => 'This is a product title',
            'details' => "This is a product description",
            'price' => '100',
            'quantity' => '10',
            'user_id' => User::factory()->create()->id,
        ]);
        // dd($product->id);
        // dd($response['id']);
        // Act / Action / perform
        $response = $this->get('api/product/single/info/'.$product->id);

        // Assertion  / perdict
        $response->assertStatus(200); 
        $this->assertEquals($product->id,$response['id']);
        $response->assertSee('This is a product title');
        $response->assertSee('This is a product description');
        $response->assertSee('100');
        $response->assertSee('10');
    }
}
