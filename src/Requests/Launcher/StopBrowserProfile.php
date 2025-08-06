<?php

namespace ChrisReedIO\MultiloginSDK\Requests\Launcher;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Stop Browser Profile
 */
class StopBrowserProfile extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/api/v1/profile/stop/p/{$this->profileId}";
	}


	/**
	 * @param string $profileId
	 */
	public function __construct(
		protected string $profileId,
	) {
	}


	public function defaultHeaders(): array
	{
		return array_filter([]);
	}
}
