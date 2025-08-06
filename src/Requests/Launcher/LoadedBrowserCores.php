<?php

namespace ChrisReedIO\MultiloginSDK\Requests\Launcher;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Loaded Browser Cores
 */
class LoadedBrowserCores extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/api/v1/loaded_browser_cores';
    }

    public function __construct() {}

    public function defaultHeaders(): array
    {
        return array_filter([]);
    }
}
