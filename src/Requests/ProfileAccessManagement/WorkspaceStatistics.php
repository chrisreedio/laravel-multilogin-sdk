<?php

namespace ChrisReedIO\MultiloginSDK\Requests\ProfileAccessManagement;

use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

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

    public function createDtoFromResponse(Response $response): array
    {
        return $response->json('data');
    }
}
