<?php

namespace ChrisReedIO\MultiloginSDK\Requests\ProfileManagement;

use DateTime;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Profile Search
 */
class ProfileSearch extends Request implements HasBody
{
	use HasJsonBody;

	protected Method $method = Method::POST;


	public function resolveEndpoint(): string
	{
		return "/profile/search";
	}


	/**
	 * @param null|string $isRemoved `Required`. Specify which type of profiles to search from. Defaults to `false`.
	 * @param null|string $limit `Required`. Specify the number of profiles to search. Defaults to `10`.
	 * @param null|string $offset `Required`. Specify the number of profiles to skip from the beginning of the returned data before displaying the results. 0 means starting from the beginning. Defaults to `0`.
	 * @param null|string $searchText `Required`. Search profiles by name. `maxLength`: 50 characters. An empty string searches from all the profiles.
	 * @param null|string $storageType `Required`. Specify the storage type of profiles to search.
	 * @param null|string $folderId `Optional`. Specify the folder in which searching is done
	 * @param null|string $sort `Optional`.  Specify the order order of sorting. Defaults to `asc`.
	 * @param null|string $coreVersion `Optional`. Specify the core version.
	 * @param null|string $createdFrom `Optional`. Specify the start of the date range.
	 * @param null|string $createdTo `Optional`. Specify the end of the date range.
	 * @param null|string $updatedFrom `Optional`.  Specify the start of the date range.
	 * @param null|string $updatedTo `Optional`. Specify the end of the date range.
	 * @param null|string $lastLaunchedFrom `Optional`. Specify the start of the date range.
	 * @param null|string $lastLaunchedTo `Optional`. Specify the end of the date range.
	 * @param null|string $lastLaunchedBy `Optional`. Specify the email.
	 * @param null|string $lastLaunchedOn `Optional`. Specify machine_id.
	 * @param null|string $lastUpdatedBy `Optional`. Specify the email.
	 * @param null|string $inUseBy `Optional`.  Specify the email.
	 * @param null|string $createdBy `Optional`. Specify the email.
	 * @param null|string $xStrictMode Default to false. If set to true, you must specify values for all required parameters.
	 */
	public function __construct(
		protected ?string $isRemoved = null,
		protected ?string $limit = null,
		protected ?string $offset = null,
		protected ?string $searchText = null,
		protected ?string $storageType = null,
		protected ?string $folderId = null,
		protected ?string $sort = null,
		protected ?string $coreVersion = null,
		protected ?string $createdFrom = null,
		protected ?string $createdTo = null,
		protected ?string $updatedFrom = null,
		protected ?string $updatedTo = null,
		protected ?string $lastLaunchedFrom = null,
		protected ?string $lastLaunchedTo = null,
		protected ?string $lastLaunchedBy = null,
		protected ?string $lastLaunchedOn = null,
		protected ?string $lastUpdatedBy = null,
		protected ?string $inUseBy = null,
		protected ?string $createdBy = null,
		protected ?string $xStrictMode = null,
	) {
	}


	public function defaultQuery(): array
	{
		return array_filter([
			'is_removed' => $this->isRemoved,
			'limit' => $this->limit,
			'offset' => $this->offset,
			'search_text' => $this->searchText,
			'storage_type' => $this->storageType,
			'folder_id' => $this->folderId,
			'sort' => $this->sort,
			'core_version' => $this->coreVersion,
			'created_from' => $this->createdFrom,
			'created_to' => $this->createdTo,
			'updated_from' => $this->updatedFrom,
			'updated_to' => $this->updatedTo,
			'last_launched_from' => $this->lastLaunchedFrom,
			'last_launched_to' => $this->lastLaunchedTo,
			'last_launched_by' => $this->lastLaunchedBy,
			'last_launched_on' => $this->lastLaunchedOn,
			'last_updated_by' => $this->lastUpdatedBy,
			'in_use_by' => $this->inUseBy,
			'created_by' => $this->createdBy,
		]);
	}


	public function defaultHeaders(): array
	{
		return array_filter(['X-Strict-Mode' => $this->xStrictMode]);
	}
}
