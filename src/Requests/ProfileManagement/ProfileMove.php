<?php

namespace ChrisReedIO\MultiloginSDK\Requests\ProfileManagement;

use DateTime;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Profile Move
 */
class ProfileMove extends Request implements HasBody
{
	use HasJsonBody;

	protected Method $method = Method::POST;


	public function resolveEndpoint(): string
	{
		return "/profile/move";
	}


	/**
	 * @param null|mixed $destFolderId
	 * @param null|mixed $ids
	 * @param null|string $destFolderId `Required`. Specify the folder, to which profiles will be moved.
	 * @param null|string $ids `Required`. Provide a list of profiles to be moved. Max number of IDs is 20.
	 */
	public function __construct(
		protected ?string $destFolderId = null,
		protected ?string $ids = null,
	) {
	}


	public function defaultBody(): array
	{
		return array_filter(['dest_folder_id' => $this->destFolderId, 'ids' => $this->ids]);
	}


	public function defaultQuery(): array
	{
		return array_filter(['dest_folder_id' => $this->destFolderId, 'ids' => $this->ids]);
	}


	public function defaultHeaders(): array
	{
		return array_filter([]);
	}
}
