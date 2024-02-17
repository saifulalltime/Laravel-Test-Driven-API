<?php 

namespace App\Http\PaymentGatewayHandler;

interface PaymentGateway{

    public function charge(int $amount, string $token);
}