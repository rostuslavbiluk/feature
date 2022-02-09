<?php declare(strict_types=1);

namespace App\Services\Toggle\Feature\Type\Payout;


use App\Services\Toggle\Feature\BaseFeature;

class PayoutAllFeature extends BaseFeature
{
    protected $name = 'all';

    public function getOptions(): array
    {
        return [
            'enabled' => $this->isActive(),
        ];
    }
}
