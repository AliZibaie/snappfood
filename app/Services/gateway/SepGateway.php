<?php

namespace App\Services\gateway;

use App\contracts\PaymentGatewayInterface;

class SepGateway implements  PaymentGatewayInterface
{
    public function pay(int $amount)
    {
        // TODO: Implement pay() method.
    }
}
