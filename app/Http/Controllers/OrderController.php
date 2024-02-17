<?php

namespace App\Http\Controllers;

use App\Http\PaymentGatewayHandler\PaymentGateway;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    protected $paymentGateway;

     public function __construct(PaymentGateway $paymentGateway)
    {
        $this->paymentGateway = $paymentGateway;
    }
    // Create a new Order 
    public function createOrder(Request $request)
    {
        // Gether User Information from the user
        
        // Confirm the product is available 
        $product = Product::find($request['product_id']);
        $amount = $product->ammount*$request['quantity'];
        // Charge for the order 
        $this->paymentGateway->charge($amount,$request['token']);
        // Create an order 
        $order = Order::create([
            'email' => $request['email'],
        ]);
        // Create record into order item

        foreach(range(1,$request['quantity']) as $i){
            $order->orderItems()->create([]);
        }

        return "Order placed successfully";
    }
}
