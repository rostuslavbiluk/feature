<?php declare(strict_types=1);

namespace App\Services\Toggle\Feature\Type\Payment;


use App\Services\Toggle\CollectionFeature;

class PaymentCollectionFeature extends CollectionFeature
{
    protected $nameCollection = 'payment';

    protected $itemCollection = [
        ApplePayFeature::class,
        SberPayFeature::class,
    ];
}
