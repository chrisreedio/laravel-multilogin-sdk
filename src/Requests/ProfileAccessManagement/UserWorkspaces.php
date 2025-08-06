<?php

namespace ChrisReedIO\MultiloginSDK\Requests\ProfileAccessManagement;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * User Workspaces
 */
class UserWorkspaces extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/user/workspaces";
	}


	public function __construct()
	{
	}


	public function defaultHeaders(): array
	{
		return array_filter([]);
	}
}
