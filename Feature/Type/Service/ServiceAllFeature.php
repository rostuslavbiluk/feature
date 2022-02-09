<?php declare(strict_types=1);

namespace App\Services\Toggle\Feature\Type\Service;


use App\Services\Toggle\Feature\BaseFeature;

class ServiceAllFeature extends BaseFeature
{
    protected $name = 'all';

    protected $mockButton = [
        'url'    => '/',
        'title'  => 'на главную',
        'color'  => '#f5df14',
        'target' => false,
    ];

    protected $mockTime = [
        'from' => false,
        'to'   => false,
    ];

    protected $mockImage = [
        'src' => '/',
    ];

    public function getOptions(): array
    {
        $isActive = $this->isActive();
        $options = [
            'enabled' => $isActive,
        ];

        if (!$isActive) {
            $options += [
                'time'        => $this->mockTime,
                'title'       => 'title',
                'description' => 'description',
                'image'       => $this->mockImage,
                'button'      => $this->mockButton,
            ];
        }

        return $options;
    }

    public function additional()
    {

    }
}
