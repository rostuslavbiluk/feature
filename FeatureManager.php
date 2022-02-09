<?php declare(strict_types=1);

namespace App\Services\Toggle;


use App\Services\Toggle\Feature\IFeature;
use App\Services\Toggle\Feature\Type;
use App\Services\Toggle\Repository\IToggleRepository;
use Illuminate\Support\Collection;

class FeatureManager
{
    /** @var IToggleRepository */
    private $toggleRepository;

    /** @var string web|mobile */
    private $typeCollections;

    /** @var array */
    protected $featureCollections = [
        'web'    => [
            Type\Service\ServiceCollectionFeature::class,
            Type\Lottery\LotteryCollectionFeature::class,
            Type\Payout\PayoutCollectionFeature::class,
        ],
        'mobile' => [
            Type\Service\ServiceCollectionFeature::class,
            Type\Payment\PaymentCollectionFeature::class,
            Type\Payout\PayoutCollectionFeature::class,
        ],
    ];

    public function __construct(IToggleRepository $toggleRepository, string $typeCollections = 'web')
    {
        $this->toggleRepository = $toggleRepository;
        $this->typeCollections = $typeCollections;
    }

    public function setTypeCollections(string $typeCollections): FeatureManager
    {
        $this->typeCollections = $typeCollections;
        return $this;
    }

    public function allFeatureToggle(): Collection
    {
        $collection = $this->getActiveTypeCollections();
        return $collection;
    }

    public function getFeatureToggle(string $name): ?IFeature
    {
        $collection = $this->getActiveTypeCollections();
        $feature = $collection->get($name);

        return $feature;
    }

    private function getActiveTypeCollections(): Collection
    {
        if (!array_key_exists($this->typeCollections, $this->featureCollections)) {
            throw new \InvalidArgumentException('incorrect type collections');
        }

        $collection = new Collection([]);
        $activeCollections = $this->featureCollections[$this->typeCollections];

        /** @var ICollectionFeature $instance */
        foreach ($activeCollections as $objCollection) {
            $instance = new $objCollection($this->toggleRepository);
            $featureCollections = $instance->getFeatureCollections($this->typeCollections);

            $collection = $collection->merge($featureCollections);
            unset($instance);
        }

        return $collection;
    }
}
