<?php

namespace ChrisReedIO\MultiloginSDK\Requests\ProfileAccessManagement;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Workspace Statistics
 */
class WorkspaceStatistics extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/workspace/statistics';
    }

    public function __construct() {}

    public function defaultHeaders(): array
    {
        return array_filter([]);
    }
}
