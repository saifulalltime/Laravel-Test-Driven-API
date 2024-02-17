<?php 

namespace App\Http\PaymentGatewayHandler;

class FakePaymentGateway implements PaymentGateway
{
    // Define Variables
    private $charges;

    // Get Valid Access Token
    public function getValidTestToken()
    {
       return "valid-token";
    }

    // Total Charge Amount function
    public function totalCharges()
    {
        return array_sum($this->charges);
    }    

    // Get Single Charge Amount function
    public function charge(int $amount, string $token)
    {
        $this->charges[] = $amount;   
    }
}