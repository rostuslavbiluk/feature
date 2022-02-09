<?php declare(strict_types=1);


namespace App\Services\Toggle\Feature\Type\Lottery;


use App\Services\Toggle\Feature\BaseFeature;

class OffersTypeFeature extends BaseFeature
{
    protected $name = 'offers';

    public function getOptions(): array
    {
        return [
            'enabled' => $this->isActive(),
        ];
    }
}
