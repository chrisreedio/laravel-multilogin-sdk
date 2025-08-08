<?php

namespace ChrisReedIO\MultiloginSDK\Requests\Launcher;

use ChrisReedIO\MultiloginSDK\Enums\MultiloginDomain;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Get Profile Status
 */
class GetProfileStatus extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return MultiloginDomain::LAUNCHER->getUrl()."/api/v1/profile/status/p/{$this->profileId}";
    }

    public function __construct(
        protected string $profileId,
    ) {}

    public function defaultHeaders(): array
    {
        return array_filter([]);
    }
}
