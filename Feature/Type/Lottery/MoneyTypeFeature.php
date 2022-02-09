<?php declare(strict_types=1);

namespace App\Services\Toggle\Feature\Type\Lottery;


use App\Services\Toggle\Feature\BaseFeature;

class MoneyTypeFeature extends BaseFeature
{
    protected $name = 'money';

    protected $mockButton = [
        'url'    => 'https://spasibosberbank.ru/lottery',
        'title'  => 'на главную',
        'color'  => '#f5df14',
        'target' => false,
    ];

    protected $mockTime = [
        'from' => false,
        'to'   => false,
    ];

    protected $mockImage = [
        'src' => 'https://spasibosberbank.ru/upload/iblock/dad/stoloto_offer_cover_new_m10-_2_-_1_-_1_.jpg',
    ];

    public function getOptions(): array
    {
        $isActive = $this->isActive();
        $options = [
            'enabled'     => $isActive,
        ];

        if (!$isActive) {

            $options += [
                'time'        => $this->mockTime,
                'title'       => 'Жаль, но Лотереи временно не работают',
                'description' => 'Чуточку терпения, скоро мы всё починим',
                'image'       => $this->mockImage,
                'button'      => $this->mockButton,
            ];
        }

        return $options;
    }
}
