<?php declare(strict_types=1);

namespace App\Services\Toggle\Repository;


interface IToggleRepository
{
/*    public function setGroup(string $group): void;

    public function getGroup(): string;*/

    public function isActive(string $toggleKey): bool;

//    public function __invoke(string $toggleKey, string $platform): bool;
}
