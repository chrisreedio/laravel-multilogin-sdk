<?php

namespace ChrisReedIO\MultiloginSDK\Data;

use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\Data;

class ProfileCreateParameters extends Data
{
    public function __construct(
        public ProfileFlags $flags,
        public ProfileStorage $storage,
        public ProfileFingerprint $fingerprint,
        public ?ProxyData $proxy = null,
        #[MapName('custom_start_urls')]
        /** @var string[] */
        public array $customStartUrls = [],
    ) {}
}
