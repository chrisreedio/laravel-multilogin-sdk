<?php

namespace ChrisReedIO\MultiloginSDK\Requests\Launcher;

use DateTime;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Cookie Import
 */
class CookieImport extends Request implements HasBody
{
	use HasJsonBody;

	protected Method $method = Method::POST;


	public function resolveEndpoint(): string
	{
		return "/api/v1/cookie_import";
	}


	/**
	 * @param null|string $profileId `Required`
	 * @param null|string $folderId `Required`. Defaults to `default profile ID`
	 * @param null|string $importAdvancedCookies `Required`. Set `true` if you want to imported the created cookies.
	 * @param null|string $cookies `Optional`. Only add this if you are using `import_advanced_cookies` to `false`
	 * @param null|string $xStrictMode Default to false. If set to true, you must specify values for all required parameters.
	 */
	public function __construct(
		protected ?string $profileId = null,
		protected ?string $folderId = null,
		protected ?string $importAdvancedCookies = null,
		protected ?string $cookies = null,
		protected ?string $xStrictMode = null,
	) {
	}


	public function defaultQuery(): array
	{
		return array_filter([
			'profile_id' => $this->profileId,
			'folder_id' => $this->folderId,
			'import_advanced_cookies' => $this->importAdvancedCookies,
			'cookies' => $this->cookies,
		]);
	}


	public function defaultHeaders(): array
	{
		return array_filter(['X-Strict-Mode' => $this->xStrictMode]);
	}
}
