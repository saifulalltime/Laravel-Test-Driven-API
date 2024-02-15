<?php

namespace Tests\Feature;

use App\Http\PaymentGatewayHandler\FakePaymentGateway;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PurchaseproductTest extends TestCase
{
    use RefreshDatabase;
    /** @test */
    public function user_can_able_to_purchase_a_product(){
        // Arrange
        // Create a new product 
        $product = Product::factory()->create([
            'price' => 1500
        ]);

        $payment = new FakePaymentGateway;


        // Act
        // Place order via a specific endpoint with relevant parameters
        $this->post('/api/orders/create', [
            'product_id' => $product->id,
            'email' => 'foo@bar.com',
            'quantity' => 3,
            'token' => $payment->getValidTestToken(),
        ]);

        // Assert
        // Confirm this order chraged  the amount
        // Confirm this order is available for this specific user
        // $this->assertEquals(1500, $payment->totalCharged());
        // $this->assertNotNull(Order::where('email', '=', 'foo@bar.com')->latest()->first());
    }
}
