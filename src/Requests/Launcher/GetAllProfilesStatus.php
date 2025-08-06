<?php

namespace ChrisReedIO\MultiloginSDK\Requests\Launcher;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Get All Profiles Status
 */
class GetAllProfilesStatus extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/api/v1/profile/statuses';
    }

    public function __construct() {}

    public function defaultHeaders(): array
    {
        return array_filter([]);
    }
}
