<?php

namespace ChrisReedIO\MultiloginSDK\Data;

use ChrisReedIO\MultiloginSDK\Enums\ProxyProtocol;
use InvalidArgumentException;
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
        #[MapName('type')]
        public ProxyProtocol $protocol = ProxyProtocol::HTTP,
    ) {}

    public static function fromConnectionString(string $connection): self
    {
        $parts = explode(':', trim($connection));
        if (count($parts) < 4) {
            throw new InvalidArgumentException('Invalid proxy connection string.');
        }

        $host = $parts[0];
        $port = (int) $parts[1];
        $username = implode(':', array_slice($parts, 2, -1));
        $password = end($parts);

        return new self(
            host: $host,
            port: $port,
            username: $username,
            password: $password,
            saveTraffic: true,
            protocol: $port === 1080 ? ProxyProtocol::SOCKS5 : ProxyProtocol::HTTP,
        );
    }
}
