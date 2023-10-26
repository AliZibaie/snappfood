<?php

namespace App\contracts;

interface PaymentGatewayInterface
{
    public function pay(int $amount);
}
