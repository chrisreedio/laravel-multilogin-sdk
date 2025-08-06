<?php

namespace ChrisReedIO\MultiloginSDK\Requests\ProfileImportExport;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Import Status by Profile
 */
class ImportStatusByProfile extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/api/v1/profile/imports/{$this->importId}/status";
	}


	/**
	 * @param string $importId
	 */
	public function __construct(
		protected string $importId,
	) {
	}
}
