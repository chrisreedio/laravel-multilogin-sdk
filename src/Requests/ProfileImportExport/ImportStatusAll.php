<?php

namespace ChrisReedIO\MultiloginSDK\Requests\ProfileImportExport;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Import Status All
 */
class ImportStatusAll extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/api/v1/profile/imports/statuses";
	}


	public function __construct()
	{
	}
}
