<?php

namespace ChrisReedIO\MultiloginSDK\Requests\PreMadeCookies;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Cookies List
 */
class CookiesList extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/api/v1/cookies/<your profile id>";
	}


	public function __construct()
	{
	}
}
