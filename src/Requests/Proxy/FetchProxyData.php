<?php

namespace ChrisReedIO\MultiloginSDK\Requests\Proxy;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Fetch Proxy Data
 */
class FetchProxyData extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/v1/user";
	}


	public function __construct()
	{
	}


	public function defaultHeaders(): array
	{
		return array_filter([]);
	}
}
