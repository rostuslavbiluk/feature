<?php declare(strict_types=1);

namespace App\Services\Toggle\Feature\Type\Payout;


use App\Services\Toggle\CollectionFeature;

class PayoutCollectionFeature extends CollectionFeature
{
    protected $nameCollection = 'payout';

    protected $itemCollection = [
        PayoutAllFeature::class,
    ];
}
