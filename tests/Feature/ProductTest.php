<?php

namespace Tests\Feature;

use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProductTest extends TestCase
{
    use RefreshDatabase;

    /**
     * 
     * @test
     */
    public function visitor_can_able_to_view_a_product()
    {
        // Arrange / Preperation / prepare   
        Product::create([
            'title' => 'This is a product title',
        ]);
        $response = $this->get('api/product/single/info/1');
        dd($response);
        // Act / Action / perform

        // Assertion  / perdict
    }
}
