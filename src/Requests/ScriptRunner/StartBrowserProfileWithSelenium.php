<?php

namespace ChrisReedIO\MultiloginSDK\Requests\ScriptRunner;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Start Browser Profile with Selenium
 */
class StartBrowserProfileWithSelenium extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/api/v1/profile/f/{$this->folderId}/p/{$this->profileId}/start";
	}


	/**
	 * @param string $folderId
	 * @param string $profileId
	 * @param null|string $automationType
	 */
	public function __construct(
		protected string $folderId,
		protected string $profileId,
		protected ?string $automationType = null,
	) {
	}


	public function defaultQuery(): array
	{
		return array_filter(['automation_type' => $this->automationType]);
	}


	public function defaultHeaders(): array
	{
		return array_filter([]);
	}
}
