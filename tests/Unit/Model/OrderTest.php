<?php

namespace Tests\Unit\Model;

use App\Models\Order;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class OrderTest extends TestCase
{
    use RefreshDatabase;
    /**
     * @test
     */
    public function an_order_has_many_order_items()
    {
        // Arrange 
        $order = Order::factory()->create([
            'email' => 'foo@bar.com',
        ]);

        $this->assertInstanceOf(HasMany::class, $order->orderItems());
        
        // 
    }
}
