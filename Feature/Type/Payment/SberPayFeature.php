<?php declare(strict_types=1);

namespace App\Services\Toggle\Feature\Type\Payment;



use App\Services\Toggle\Feature\BaseFeature;

class SberPayFeature extends BaseFeature
{
    protected $name = 'sberPay';

    public function getOptions(): array
    {
        return [
            'enabled' => $this->isActive(),
            'decrease' => false,
        ];
    }
}
