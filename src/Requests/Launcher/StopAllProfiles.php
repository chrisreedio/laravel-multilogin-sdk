<?php

namespace ChrisReedIO\MultiloginSDK\Requests\Launcher;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Stop All Profiles
 */
class StopAllProfiles extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/api/v1/profile/stop_all';
    }

    /**
     * @param  null|string  $type  `Optional`. Specify the type of profile to stop. `all` is set by default.
     */
    public function __construct(
        protected ?string $type = null,
    ) {}

    public function defaultQuery(): array
    {
        return array_filter(['type' => $this->type]);
    }

    public function defaultHeaders(): array
    {
        return array_filter([]);
    }
}
