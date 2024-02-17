<?php

namespace Tests\Unit;

use App\Http\PaymentGatewayHandler\FakePaymentGateway;
use PHPUnit\Framework\TestCase;

class FakePaymentGatewayTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function it_charges_the_right_amount()
    {
        $gateWay = new FakePaymentGateway;
        $gateWay->charge(1500, 'token');

        $this->assertEquals(1500, $gateWay->totalCharges());
        
    }
}
