<?php

namespace ChrisReedIO\MultiloginSDK\Resource;

use ChrisReedIO\MultiloginSDK\Requests\BookmarkManagement\CopyBookmarks;
use ChrisReedIO\MultiloginSDK\Requests\BookmarkManagement\ExportBookmarks;
use ChrisReedIO\MultiloginSDK\Requests\BookmarkManagement\ImportBookmarks;
use Saloon\Http\BaseResource;
use Saloon\Http\Response;

class BookmarkManagement extends BaseResource
{
    public function exportBookmarks(string $profileId): Response
    {
        return $this->connector->send(new ExportBookmarks($profileId));
    }

    /**
     * @param  string  $paths  `Required`. Path to a JSON file containing bookmarks
     * @param  string  $operation  `Required`. Specify what to do with exported bookmarks.
     */
    public function importBookmarks(string $profile, ?string $paths = null, ?string $operation = null): Response
    {
        return $this->connector->send(new ImportBookmarks($profile, $paths, $operation));
    }

    /**
     * @param  string  $paths  `Required`. Path to a JSON file containing bookmarks.
     * @param  string  $operation  `Required`. Specify what to do with exported bookmarks.
     */
    public function copyBookmarks(
        string $profileId,
        string $sourceProfileId,
        ?string $paths = null,
        ?string $operation = null,
    ): Response {
        return $this->connector->send(new CopyBookmarks($profileId, $sourceProfileId, $paths, $operation));
    }
}
