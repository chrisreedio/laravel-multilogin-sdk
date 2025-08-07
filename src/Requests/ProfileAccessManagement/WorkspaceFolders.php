<?php

namespace ChrisReedIO\MultiloginSDK\Requests\ProfileAccessManagement;

use ChrisReedIO\MultiloginSDK\Requests\BaseRequest;
use Saloon\Enums\Method;

/**
 * Workspace Folders
 */
class WorkspaceFolders extends BaseRequest
{
    protected Method $method = Method::GET;

    protected ?string $dataSubKey = 'folders';

    public function resolveEndpoint(): string
    {
        return '/workspace/folders';
    }
}
