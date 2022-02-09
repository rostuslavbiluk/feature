<?php declare(strict_types=1);

namespace App\Services\Toggle\Feature\Type\Lottery;


use App\Services\Toggle\CollectionFeature;

class LotteryCollectionFeature extends CollectionFeature
{
    protected $nameCollection = 'lottery';

    protected $itemCollection = [
        MoneyTypeFeature::class,
        OffersTypeFeature::class,
        BonusTypeFeature::class,
    ];
}
