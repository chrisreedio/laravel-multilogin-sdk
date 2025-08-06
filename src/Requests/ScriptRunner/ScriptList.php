<?php

namespace ChrisReedIO\MultiloginSDK\Requests\ScriptRunner;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Script List
 */
class ScriptList extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/api/v1/scripts';
    }

    public function __construct() {}

    public function defaultHeaders(): array
    {
        return array_filter([]);
    }
}
