<?php

namespace ChrisReedIO\MultiloginSDK\Data;

use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\Data;

class ProfileStorage extends Data
{
    public function __construct(
        #[MapName('is_local')]
        public bool $isLocal = true,
        #[MapName('save_service_worker')]
        public bool $saveServiceWorker = true,
    ) {}
}