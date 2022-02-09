<?php declare(strict_types=1);

namespace App\Services\Toggle\Feature\Type\Service;



use App\Services\Toggle\CollectionFeature;

class ServiceCollectionFeature extends CollectionFeature
{
    protected $nameCollection = 'service';

    protected $itemCollection = [
        ServiceAllFeature::class,
    ];
}
