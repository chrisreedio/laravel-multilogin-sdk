<?php

namespace ChrisReedIO\MultiloginSDK\Requests\ProfileImportExport;

use DateTime;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Profile Export
 */
class ProfileExport extends Request implements HasBody
{
	use HasJsonBody;

	protected Method $method = Method::POST;


	public function resolveEndpoint(): string
	{
		return "/api/v1/profile/{$this->profileId}/export";
	}


	/**
	 * @param string $profileId
	 */
	public function __construct(
		protected string $profileId,
	) {
	}
}
