<?php

namespace ChrisReedIO\MultiloginSDK\Requests\ProfileImportExport;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Export Status All
 */
class ExportStatusAll extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/api/v1/profile/exports/statuses";
	}


	public function __construct()
	{
	}
}
