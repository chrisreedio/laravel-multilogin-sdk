<?php

namespace ChrisReedIO\MultiloginSDK\Requests\Launcher;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Get QBP status
 */
class GetQbpStatus extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/api/v1/profile/quick/statuses';
    }

    public function __construct() {}
}
