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

        // Act / Action / perform
        $response = $this->get('api/product/list');

        // Assertion  / perdict
        $response->assertStatus(200);
    }
    /** @test  */
    public function visitor_can_able_to_view_a_published_product()
    {
        // Arrange / Preperation / prepare  
        /* Used State For published */ 
        $product = Product::factory()->published()->create([
            // 'published_at' => now(),
            'name' => 'This is a product title',
            'details' => "This is a product description",
            'price' => '100',
            'quantity' => '10',
            'user_id' => User::factory()->create()->id,
        ]);

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

    /** @test */
    public function it_throws_exception_when_give_product_not_found(){
          // Act / Action / perform
          $response = $this->get('api/product/single/info/99999');
         // Assertion  / perdict
         $response->assertStatus(404); 
    }

    /** @test */
    public function visitor_cannot_able_to_view_a_unpublished_product(){
        // Arrange / Preperation / prepare   

        /* Used State For unPublished */
        // $product = Product::factory()->create([
        //     "published_at" => Null
        // ]);

        $product = Product::factory()->unPublished()->create();

        // Act / Action / perform
        $response = $this->get('api/product/single/info/'.$product->id);

        // Assertion  / perdict
        $response->assertStatus(404);
    }
}
