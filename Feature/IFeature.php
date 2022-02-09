<?php declare(strict_types=1);


namespace App\Services\Toggle\Feature;


interface IFeature
{
    public function getName(): string;

    public function getParentCollection(): string;

    public function setParentCollection(string $toCollection): IFeature;

    public function getTypeCollection(): string;

    public function setTypeCollection(string $typeCollection): IFeature;

    public function isActive(): bool;
}
