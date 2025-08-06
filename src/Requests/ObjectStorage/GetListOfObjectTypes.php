<?php

namespace ChrisReedIO\MultiloginSDK\Requests\ObjectStorage;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Get list of object types
 */
class GetListOfObjectTypes extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/api/v1/resources/types';
    }

    public function __construct() {}
}
