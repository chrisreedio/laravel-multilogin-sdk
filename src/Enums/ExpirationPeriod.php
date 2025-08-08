<?php

namespace ChrisReedIO\MultiloginSDK\Enums;

use Illuminate\Support\Carbon;

enum ExpirationPeriod: string
{
    case ONE_HOUR = '1h';
    case THREE_HOURS = '3h';
    case FIVE_HOURS = '5h';
    case SIXTEEN_HOURS = '16h';
    case ONE_DAY = '24h';
    case TWO_DAYS = '48h';
    case ONE_WEEK = '1w';
    case TWO_WEEKS = '2w';
    case THREE_WEEKS = '3w';
    case ONE_MONTH = '1mo';
    case NO_EXPIRATION = 'no_exp';

    public function toSeconds(): int
    {
        return match ($this) {
            self::ONE_HOUR => 3600,
            self::THREE_HOURS => 10800,
            self::FIVE_HOURS => 18000,
            self::SIXTEEN_HOURS => 57600,
            self::ONE_DAY => 86400,
            self::TWO_DAYS => 172800,
            self::ONE_WEEK => 604800,
            self::TWO_WEEKS => 1209600,
            self::THREE_WEEKS => 1814400,
            self::ONE_MONTH => 2592000,
            self::NO_EXPIRATION => 0,
        };
    }

    public function expiresAt(): ?Carbon
    {
        if ($this === self::NO_EXPIRATION) {
            return null;
        }

        return Carbon::now()->addSeconds($this->toSeconds());
    }
}
