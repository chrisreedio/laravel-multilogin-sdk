<?php

namespace ChrisReedIO\MultiloginSDK\Requests\BookmarkManagement;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Export Bookmarks
 */
class ExportBookmarks extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/api/v1/profile/{$this->profileId}/bookmarks/export";
    }

    public function __construct(
        protected string $profileId,
    ) {}
}
