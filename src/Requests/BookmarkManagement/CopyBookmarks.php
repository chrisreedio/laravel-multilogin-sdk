<?php

namespace ChrisReedIO\MultiloginSDK\Requests\BookmarkManagement;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Copy Bookmarks
 */
class CopyBookmarks extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return "/api/v1/profile/{$this->profileId}/bookmarks/copy/{$this->sourceProfileId}";
    }

    /**
     * @param  null|string  $paths  `Required`. Path to a JSON file containing bookmarks.
     * @param  null|string  $operation  `Required`. Specify what to do with exported bookmarks.
     */
    public function __construct(
        protected string $profileId,
        protected string $sourceProfileId,
        protected ?string $paths = null,
        protected ?string $operation = null,
    ) {}

    public function defaultQuery(): array
    {
        return array_filter(['paths' => $this->paths, 'operation' => $this->operation]);
    }
}
