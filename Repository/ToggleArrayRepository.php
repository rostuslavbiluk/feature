<?php declare(strict_types=1);

namespace App\Services\Toggle\Repository;


class ToggleArrayRepository implements IToggleRepository
{
    private $fileConfig = 'feature-toggles';

    public function isActive(string $toggleKey): bool
    {
        return config("{$this->fileConfig}.{$toggleKey}");
    }
}
