<?php

namespace App\Queries;

class GetOrdersQuery
{
    public $customerId;

    public function __construct($customerId)
    {
        $this->customerId = $customerId;
    }
}
