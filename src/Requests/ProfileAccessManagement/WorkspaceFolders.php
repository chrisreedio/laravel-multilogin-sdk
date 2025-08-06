<?php

namespace ChrisReedIO\MultiloginSDK\Requests\ProfileAccessManagement;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Workspace Folders
 */
class WorkspaceFolders extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/workspace/folders';
    }

    public function __construct() {}

    public function defaultHeaders(): array
    {
        return array_filter([]);
    }
}
