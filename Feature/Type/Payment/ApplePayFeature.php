<?php declare(strict_types=1);

namespace App\Services\Toggle\Feature\Type\Payment;


use App\Services\Toggle\Feature\BaseFeature;

class ApplePayFeature extends BaseFeature
{
    protected $name = 'applePay';

    public function getOptions(): array
    {
        return [
            'enabled'  => $this->isActive(),
            'decrease' => false,
        ];
    }
}
