<?php

namespace ChrisReedIO\MultiloginSDK\Requests\ProfileAccessManagement;

use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

/**
 * User Workspaces
 */
class UserWorkspaces extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/user/workspaces';
    }

    public function __construct() {}

    public function createDtoFromResponse(Response $response): array
    {
        return $response->json('data.workspaces');
    }
}
