<?php

namespace ChrisReedIO\MultiloginSDK\Requests\ProfileManagement;

use DateTime;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Profile Convert
 */
class ProfileConvert extends Request implements HasBody
{
	use HasJsonBody;

	protected Method $method = Method::POST;


	public function resolveEndpoint(): string
	{
		return "/api/v1/profile/{$this->profileId}/convert";
	}


	/**
	 * @param string $profileId
	 * @param null|string $convertToLocal `Required`. True if you want to convert from cloud to local and false otherwise.
	 * @param null|string $workspaceId `Required`. Specify the workspace id.
	 */
	public function __construct(
		protected string $profileId,
		protected ?string $convertToLocal = null,
		protected ?string $workspaceId = null,
	) {
	}


	public function defaultQuery(): array
	{
		return array_filter(['convert_to_local' => $this->convertToLocal, 'workspace_id' => $this->workspaceId]);
	}


	public function defaultHeaders(): array
	{
		return array_filter([]);
	}
}
