<?php

namespace ChrisReedIO\MultiloginSDK\Requests\Proxy;

use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

/**
 * Fetch Proxy Data
 */
class FetchProxyData extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/v1/user';
    }

    public function createDtoFromResponse(Response $response): int
    {
        return $response->json('traffic');
    }
}
