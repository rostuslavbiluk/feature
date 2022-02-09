<?php declare(strict_types=1);

namespace App\Services\Toggle;


interface ICollectionFeature
{

    public function getFeatureCollections(string $typeCollection): array;
}
