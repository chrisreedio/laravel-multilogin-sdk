<?php

namespace ChrisReedIO\MultiloginSDK\Requests\Launcher;

use ChrisReedIO\MultiloginSDK\Enums\MultiloginDomain;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Stop Browser Profile
 */
class StopBrowserProfile extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return MultiloginDomain::LAUNCHER->getUrl()."/api/v1/profile/stop/p/{$this->profileId}";
    }

    public function __construct(
        protected string $profileId,
    ) {}

    public function defaultHeaders(): array
    {
        return array_filter([]);
    }
}
