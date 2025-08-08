<?php

namespace ChrisReedIO\MultiloginSDK\Requests\Launcher;

use ChrisReedIO\MultiloginSDK\Enums\MultiloginDomain;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Get Version
 */
class GetVersion extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return MultiloginDomain::LAUNCHER->getUrl().'/api/v1/version';
    }

    public function __construct() {}

    public function defaultHeaders(): array
    {
        return array_filter([]);
    }
}
