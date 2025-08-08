<?php

namespace ChrisReedIO\MultiloginSDK\Data;

use Spatie\LaravelData\Data;

class ProfilePartialUpdateParameters extends Data
{
    public function __construct(
        public ?ProfileFlags $flags = null,
        public ?ProfileStorage $storage = null,
        public ?ProfileFingerprint $fingerprint = null,
    ) {}
}
