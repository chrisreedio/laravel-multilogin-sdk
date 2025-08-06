<?php

namespace ChrisReedIO\MultiloginSDK\Requests\PreMadeCookies;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Target Website List
 */
class TargetWebsiteList extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/api/v1/cookies/metadata/websites";
	}


	public function __construct()
	{
	}
}
