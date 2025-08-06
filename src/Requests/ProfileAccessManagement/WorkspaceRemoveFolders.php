<?php

namespace ChrisReedIO\MultiloginSDK\Requests\ProfileAccessManagement;

use DateTime;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Workspace Remove Folders
 */
class WorkspaceRemoveFolders extends Request implements HasBody
{
	use HasJsonBody;

	protected Method $method = Method::POST;


	public function resolveEndpoint(): string
	{
		return "/workspace/folders_remove";
	}


	/**
	 * @param null|mixed $ids
	 * @param null|string $ids `Required`. Specify the folder ID to remove,
	 */
	public function __construct(
		protected ?string $ids = null,
	) {
	}


	public function defaultBody(): array
	{
		return array_filter(['ids' => $this->ids]);
	}


	public function defaultQuery(): array
	{
		return array_filter(['ids' => $this->ids]);
	}


	public function defaultHeaders(): array
	{
		return array_filter([]);
	}
}
