<?php

namespace ChrisReedIO\MultiloginSDK\Requests\ObjectStorage;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Get Statistics for Objects
 */
class GetStatisticsForObjects extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/api/v1/resources/statistics';
    }

    public function __construct() {}
}
