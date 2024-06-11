<?php

return [
    'handlers' => [
        \App\Services\Discount\Type\PercentageDiscountHandler::class => 10,
        \App\Services\Discount\Type\BuyOneGetOneFreeHandler::class => null,
        \App\Services\Discount\Type\CheapestProductDiscountHandler::class => null,
    ],
];
