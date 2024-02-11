<?php

namespace Tests\Unit;

use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
// use PHPUnit\Framework\TestCase;
use Tests\TestCase;


class ProductTest extends TestCase
{
    use RefreshDatabase;
    /** @test */
    public function it_will_convert_the_price_taka_to_dollar()
    {
        // Arrange / Preperation / prepare   
        $priceInTaka = 500;

        // Act / Action / perform
        $product = Product::factory()->create([
            'price' => $priceInTaka,
        ]);

        // Assertion  / perdict
        $this->assertSame(5.0,$product->priceInDollar());
    }
}
