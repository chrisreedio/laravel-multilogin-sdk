<?php

namespace ChrisReedIO\MultiloginSDK\Requests\ProfileAccessManagement;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Workspace Restrictions
 */
class WorkspaceRestrictions extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/workspace/restrictions";
	}


	public function __construct()
	{
	}


	public function defaultHeaders(): array
	{
		return array_filter([]);
	}
}
