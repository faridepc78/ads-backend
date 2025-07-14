<?php

namespace App\Enums\Api\V1\Ad;

enum AdOperatorEnum: string
{
    case MCI = 'mci';
    case IRANCELL = 'irancell';
    case RIGHTEL = 'rightel';

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}
