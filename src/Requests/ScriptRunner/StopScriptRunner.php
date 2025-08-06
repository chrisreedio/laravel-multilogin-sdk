<?php

namespace ChrisReedIO\MultiloginSDK\Requests\ScriptRunner;

use DateTime;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Stop Script Runner
 */
class StopScriptRunner extends Request implements HasBody
{
	use HasJsonBody;

	protected Method $method = Method::POST;


	public function resolveEndpoint(): string
	{
		return "/api/v1/profile/stop_script";
	}


	/**
	 * @param null|mixed $profileIds
	 */
	public function __construct(
		protected mixed $profileIds = null,
	) {
	}


	public function defaultBody(): array
	{
		return array_filter(['profile_ids' => $this->profileIds]);
	}


	public function defaultHeaders(): array
	{
		return array_filter([]);
	}
}
