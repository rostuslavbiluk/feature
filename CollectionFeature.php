<?php declare(strict_types=1);

namespace App\Services\Toggle;


use App\Services\Toggle\Feature\IFeature;
use App\Services\Toggle\Repository\IToggleRepository;
use Illuminate\Support\Collection;


class CollectionFeature implements ICollectionFeature
{
    /** @var string */
    protected $nameCollection;

    /** @var array */
    protected $itemCollection = [];

    /** @var IToggleRepository */
    protected $repository;

    public function __construct(IToggleRepository $repository)
    {
        $this->repository = $repository;
    }

    public function getFeatureCollections(string $typeCollection): array
    {
        $collections = new Collection([]);

        /** @var IFeature $instanceFeature */
        foreach ($this->itemCollection as $feature) {
            $instanceFeature = new $feature($this->repository);

            if (!empty($instanceFeature->getName())) {
                $instanceFeature->setParentCollection($this->nameCollection);
                $instanceFeature->setTypeCollection($typeCollection);

                $collections->put(
                    $this->nameCollection . '.' . $instanceFeature->getName(),
                    $instanceFeature
                );
            }
            unset($instanceFeature);
        }

        return $collections->toArray();
    }
}
