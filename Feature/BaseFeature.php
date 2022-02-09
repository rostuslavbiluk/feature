<?php declare(strict_types=1);

namespace App\Services\Toggle\Feature;


use App\Services\Toggle\Repository\IToggleRepository;

class BaseFeature implements IFeature
{
    /** @var string */
    protected $name;

    /** @var string */
    protected $parentCollection;

    /** @var string */
    protected $typeCollection;

    /** @var IToggleRepository */
    protected $repository;

    public function __construct(IToggleRepository $repository)
    {
        $this->repository = $repository;
    }

    public function getName(): string
    {
        return $this->name ?? '';
    }

    public function getParentCollection(): string
    {
        return $this->parentCollection ?? '';
    }

    public function setParentCollection(string $toCollection): IFeature
    {
        $this->parentCollection = $toCollection;
        return $this;
    }

    public function getTypeCollection(): string
    {
        return $this->typeCollection ?? '';
    }

    public function setTypeCollection(string $typeCollection): IFeature
    {
        $this->typeCollection = $typeCollection;
        return $this;
    }

    public function isActive(): bool
    {
        return $this->repository->isActive(
            $this->getParentCollection() . '.' . $this->getName() . '.' . $this->getTypeCollection()
        );
    }

    public function getOptions(): array
    {
        return [
            'enabled' => $this->isActive(),
        ];
    }
}
