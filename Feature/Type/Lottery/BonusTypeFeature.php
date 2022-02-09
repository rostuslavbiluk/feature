<?php declare(strict_types=1);

namespace App\Services\Toggle\Feature\Type\Lottery;


use App\Services\Toggle\Feature\BaseFeature;

class BonusTypeFeature extends BaseFeature
{
    protected $name = 'bonus';

    public function getOptions(): array
    {
        return [
            'enabled' => $this->isActive(),
        ];
    }
}
