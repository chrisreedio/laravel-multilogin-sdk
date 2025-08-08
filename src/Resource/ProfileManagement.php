<?php

namespace ChrisReedIO\MultiloginSDK\Resource;

use ChrisReedIO\MultiloginSDK\Data\ProfileCreateParameters;
use ChrisReedIO\MultiloginSDK\Data\ProfilePartialUpdateParameters;
use ChrisReedIO\MultiloginSDK\Data\ProxyData;
use ChrisReedIO\MultiloginSDK\Enums\BrowserType;
use ChrisReedIO\MultiloginSDK\Enums\OsType;
use ChrisReedIO\MultiloginSDK\Requests\ProfileManagement\ProfileClone;
use ChrisReedIO\MultiloginSDK\Requests\ProfileManagement\ProfileConvert;
use ChrisReedIO\MultiloginSDK\Requests\ProfileManagement\ProfileCreate;
use ChrisReedIO\MultiloginSDK\Requests\ProfileManagement\ProfileMetas;
use ChrisReedIO\MultiloginSDK\Requests\ProfileManagement\ProfileMove;
use ChrisReedIO\MultiloginSDK\Requests\ProfileManagement\ProfilePartialUpdate;
use ChrisReedIO\MultiloginSDK\Requests\ProfileManagement\ProfileRemove;
use ChrisReedIO\MultiloginSDK\Requests\ProfileManagement\ProfileRestore;
use ChrisReedIO\MultiloginSDK\Requests\ProfileManagement\ProfileSearch;
use ChrisReedIO\MultiloginSDK\Requests\ProfileManagement\ProfileSummary;
use ChrisReedIO\MultiloginSDK\Requests\ProfileManagement\ProfileUpdate;
use ChrisReedIO\MultiloginSDK\Requests\ProfileManagement\ScreenResolution;
use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use Saloon\PaginationPlugin\Paginator;

class ProfileManagement extends BaseResource
{
    /**
     * Create new browser profiles with specified parameters.
     *
     * @param  string  $name  Profile name
     * @param  string  $folderId  Folder ID where profiles will be created
     * @param  ProfileCreateParameters  $parameters  Profile configuration including flags, fingerprint, storage, proxy
     * @param  OsType  $osType  Operating system type (defaults to Windows)
     * @param  BrowserType  $browserType  Browser type (mimic, stealthfox, etc.) (defaults to mimic)
     * @param  int|null  $coreVersion  Browser core version (optional)
     * @param  int|null  $coreMinorVersion  Browser core minor version (optional)
     * @param  int|null  $times  Number of profiles to create (defaults to 1)
     * @param  string|null  $notes  Profile notes (optional)
     * @param  bool|null  $xStrictMode  Enable strict mode validation (optional)
     */
    public function create(
        string $name,
        string $folderId,
        ProfileCreateParameters $parameters,
        OsType $osType = OsType::WINDOWS,
        BrowserType $browserType = BrowserType::MIMIC,
        ?int $coreVersion = null,
        ?int $coreMinorVersion = null,
        ?int $times = null,
        ?string $notes = null,
        ?bool $xStrictMode = null,
    ): Response {
        return $this->connector->send(new ProfileCreate(
            $name,
            $folderId,
            $parameters,
            $osType,
            $browserType,
            $coreVersion,
            $coreMinorVersion,
            $times,
            $notes,
            $xStrictMode
        ));
    }

    /**
     * @param  string  $searchText  `Required`. Search profiles by name. `maxLength`: 50 characters. An empty string searches from all the profiles.
     * @param  string  $isRemoved  `Required`. Specify which type of profiles to search from. Defaults to `false`.
    //  * @param  string  $limit  `Required`. Specify the number of profiles to search. Defaults to `10`.
    //  * @param  string  $offset  `Required`. Specify the number of profiles to skip from the beginning of the returned data before displaying the results. 0 means starting from the beginning. Defaults to `0`.
     * @param  string  $storageType  `Required`. Specify the storage type of profiles to search.
     * @param  string  $folderId  `Optional`. Specify the folder in which searching is done
     * @param  string  $sort  `Optional`.  Specify the order order of sorting. Defaults to `asc`.
     * @param  string  $coreVersion  `Optional`. Specify the core version.
     * @param  string  $createdFrom  `Optional`. Specify the start of the date range.
     * @param  string  $createdTo  `Optional`. Specify the end of the date range.
     * @param  string  $updatedFrom  `Optional`.  Specify the start of the date range.
     * @param  string  $updatedTo  `Optional`. Specify the end of the date range.
     * @param  string  $lastLaunchedFrom  `Optional`. Specify the start of the date range.
     * @param  string  $lastLaunchedTo  `Optional`. Specify the end of the date range.
     * @param  string  $lastLaunchedBy  `Optional`. Specify the email.
     * @param  string  $lastLaunchedOn  `Optional`. Specify machine_id.
     * @param  string  $lastUpdatedBy  `Optional`. Specify the email.
     * @param  string  $inUseBy  `Optional`.  Specify the email.
     * @param  string  $createdBy  `Optional`. Specify the email.
     * @param  string  $xStrictMode  Default to false. If set to true, you must specify values for all required parameters.
     */
    public function search(
        ?string $searchText = '',
        ?string $isRemoved = null,
        // ?string $limit = null,
        // ?string $offset = null,
        ?string $storageType = null,
        ?string $folderId = null,
        ?string $sort = null,
        ?string $coreVersion = null,
        ?string $createdFrom = null,
        ?string $createdTo = null,
        ?string $updatedFrom = null,
        ?string $updatedTo = null,
        ?string $lastLaunchedFrom = null,
        ?string $lastLaunchedTo = null,
        ?string $lastLaunchedBy = null,
        ?string $lastLaunchedOn = null,
        ?string $lastUpdatedBy = null,
        ?string $inUseBy = null,
        ?string $createdBy = null,
        ?string $contentType = null,
        ?string $accept = null,
        ?string $xStrictMode = null,
    ): Paginator {
        $request = new ProfileSearch($searchText, $isRemoved, $storageType, $folderId, $sort, $coreVersion, $createdFrom, $createdTo, $updatedFrom, $updatedTo, $lastLaunchedFrom, $lastLaunchedTo, $lastLaunchedBy, $lastLaunchedOn, $lastUpdatedBy, $inUseBy, $createdBy, $contentType, $accept, $xStrictMode);

        // return $this->connector->send($request);
        return $request->paginate($this->connector);
    }

    /**
     * @param  string|array  $ids  `Required`. Specify the ID of the profile to be deleted.
     * @param  bool  $permanently  `Required`. Specify the value to delete profiles perminantly or not. Defaults to `false`.
     * @param  bool  $xStrictMode  Default to false. If set to true, you must specify values for all required parameters.
     */
    public function remove(
        string|array $ids,
        bool $permanently = false,
        bool $xStrictMode = false,
    ): Response {
        return $this->connector->send(new ProfileRemove($ids, $permanently, $xStrictMode));
    }

    /**
     * Completely update a browser profile with new configuration.
     *
     * @param  string  $profileId  Profile ID to update
     * @param  string  $name  New profile name
     * @param  ProfileCreateParameters  $parameters  Complete profile configuration
     * @param  bool|null  $autoUpdateCore  Enable automatic core updates (optional)
     * @param  int|null  $coreVersion  Browser core version (optional)
     * @param  int|null  $coreMinorVersion  Browser core minor version (optional)
     * @param  string|null  $tags  Profile tags (optional)
     * @param  string|null  $notes  Profile notes (optional)
     */
    public function update(
        string $profileId,
        string $name,
        ProfileCreateParameters $parameters,
        ?bool $autoUpdateCore = null,
        ?int $coreVersion = null,
        ?int $coreMinorVersion = null,
        ?string $tags = null,
        ?string $notes = null,
    ): Response {
        return $this->connector->send(new ProfileUpdate(
            $profileId,
            $name,
            $parameters,
            $autoUpdateCore,
            $coreVersion,
            $coreMinorVersion,
            $tags,
            $notes
        ));
    }

    /**
     * @param  string  $destFolderId  `Required`. Specify the folder, to which profiles will be moved.
     * @param  string|array  $ids  `Required`. Provide a list of profiles to be moved. Max number of IDs is 20.
     */
    public function move(string $destFolderId, string|array $ids): Response
    {
        return $this->connector->send(new ProfileMove($destFolderId, $ids));
    }

    /**
     * Partially update a browser profile with specified changes.
     *
     * @param  string  $profileId  Profile ID to update
     * @param  string|null  $name  New profile name (optional)
     * @param  bool|null  $autoUpdateCore  Enable automatic core updates (optional)
     * @param  int|null  $coreVersion  Browser core version (optional)
     * @param  int|null  $coreMinorVersion  Browser core minor version (optional)
     * @param  string|null  $tags  Profile tags (optional)
     * @param  ProxyData|null  $proxy  Proxy configuration (optional)
     * @param  array|null  $customStartUrls  Custom start URLs (optional)
     * @param  string|null  $notes  Profile notes (optional)
     * @param  ProfilePartialUpdateParameters|null  $parameters  Profile parameters to update (optional)
     */
    public function partialUpdate(
        string $profileId,
        ?string $name = null,
        ?bool $autoUpdateCore = null,
        ?int $coreVersion = null,
        ?int $coreMinorVersion = null,
        ?string $tags = null,
        ?ProxyData $proxy = null,
        ?array $customStartUrls = null,
        ?string $notes = null,
        ?ProfilePartialUpdateParameters $parameters = null,
    ): Response {
        return $this->connector->send(new ProfilePartialUpdate(
            $profileId,
            $name,
            $autoUpdateCore,
            $coreVersion,
            $coreMinorVersion,
            $tags,
            $proxy,
            $customStartUrls,
            $notes,
            $parameters
        ));
    }

    /**
     * @param  string|array  $ids  `Required`. Specify the ID of the profile you would like to restore.
     */
    public function restore(string|array $ids): Response
    {
        return $this->connector->send(new ProfileRestore($ids));
    }

    /**
     * @param  mixed  $ids
     * @param  string  $ids  `Required`. Specify the ID of the profile, which metas you would like to fetch.
     */
    public function metas(?string $ids = null): Response
    {
        return $this->connector->send(new ProfileMetas($ids));
    }

    /**
     * @param  string  $metaId  `Required`. Specify the profile id.
     */
    public function summary(string $metaId): Response
    {
        return $this->connector->send(new ProfileSummary($metaId));
    }

    /**
     * @param  string  $profileId  `Required`. Specify the ID of the original profile.
     * @param  string  $times  `Required`. Specify the number of profiles you would like to clone. Defaults to `1`.
     * @param  string  $xStrictMode  Default to false. If set to true, you must specify values for all required parameters.
     */
    public function clone(
        ?string $profileId = null,
        ?string $times = null,
        ?string $xStrictMode = null,
    ): Response {
        return $this->connector->send(new ProfileClone($profileId, $times, $xStrictMode));
    }

    /**
     * @param  string  $profileId  `Required`. Specify the profile id.
     * @param  string  $convertToLocal  `Required`. True if you want to convert from cloud to local and false otherwise.
     * @param  string  $workspaceId  `Required`. Specify the workspace id.
     */
    public function convert(
        string $profileId,
        bool $convertToLocal,
        string $workspaceId,
    ): Response {
        return $this->connector->send(new ProfileConvert($profileId, $convertToLocal, $workspaceId));
    }

    public function screenResolution(): Response
    {
        return $this->connector->send(new ScreenResolution);
    }
}
