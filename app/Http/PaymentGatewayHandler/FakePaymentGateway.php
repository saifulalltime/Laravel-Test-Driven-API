<?php 

namespace App\Http\PaymentGatewayHandler;

class FakePaymentGateway implements PaymentGateway
{
   public function getValidTestToken()
   {
       
   }

    // Total Charge Amount function
    public function totalCharges()
    {
        // Con
        return 1500;
    }    

    public function charge(int $amount, string $token)
    {
        
    }
}