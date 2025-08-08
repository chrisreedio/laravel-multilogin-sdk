<?php

namespace ChrisReedIO\MultiloginSDK\Data;

use ChrisReedIO\MultiloginSDK\Enums\ProxyType;
use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\Data;

class ProxyData extends Data
{
    public function __construct(
        public string $host,
        public int $port,
        public string $username,
        public string $password,
        #[MapName('save_traffic')]
        public bool $saveTraffic = true,
        public ProxyType $type = ProxyType::HTTP,
    ) {}
}
