<?php

namespace ChrisReedIO\MultiloginSDK\Requests\Launcher;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Delete Browser Core
 */
class DeleteBrowserCore extends Request
{
	protected Method $method = Method::DELETE;


	public function resolveEndpoint(): string
	{
		return "/api/v1/delete_browser_core";
	}


	/**
	 * @param null|string $browserType `Required`. Specify the browser type. Defaults to `mimic`
	 * @param null|string $version `Required`. Specify the core version. Defaults to `latest`.
	 * @param null|string $xStrictMode Default to false. If set to true, you must specify values for all required parameters.
	 */
	public function __construct(
		protected ?string $browserType = null,
		protected ?string $version = null,
		protected ?string $xStrictMode = null,
	) {
	}


	public function defaultQuery(): array
	{
		return array_filter(['browser_type' => $this->browserType, 'version' => $this->version]);
	}


	public function defaultHeaders(): array
	{
		return array_filter(['X-Strict-Mode' => $this->xStrictMode]);
	}
}
