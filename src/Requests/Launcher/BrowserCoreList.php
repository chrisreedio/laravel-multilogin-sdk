<?php

namespace ChrisReedIO\MultiloginSDK\Requests\Launcher;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Browser Core List
 */
class BrowserCoreList extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/bcs/core/list";
	}


	/**
	 * @param null|mixed $browserType
	 * @param null|string $browserType Specify the browser type. Defaults to `mimic`.
	 * @param null|string $xStrictMode Default to false. If set to true, you must specify values for all required parameters.
	 */
	public function __construct(
		protected ?string $browserType = null,
		protected ?string $xStrictMode = null,
	) {
	}


	public function defaultBody(): array
	{
		return array_filter(['browser_type' => $this->browserType]);
	}


	public function defaultQuery(): array
	{
		return array_filter(['browser_type' => $this->browserType]);
	}


	public function defaultHeaders(): array
	{
		return array_filter(['X-Strict-Mode' => $this->xStrictMode]);
	}
}
