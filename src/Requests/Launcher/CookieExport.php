<?php

namespace ChrisReedIO\MultiloginSDK\Requests\Launcher;

use DateTime;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Cookie Export
 */
class CookieExport extends Request implements HasBody
{
	use HasJsonBody;

	protected Method $method = Method::POST;


	public function resolveEndpoint(): string
	{
		return "/api/v1/cookie_export";
	}


	/**
	 * @param null|mixed $profileId
	 * @param null|mixed $folderId
	 * @param null|string $profileId `Required`
	 * @param null|string $folderId `Required`
	 */
	public function __construct(
		protected ?string $profileId = null,
		protected ?string $folderId = null,
	) {
	}


	public function defaultBody(): array
	{
		return array_filter(['profile_id' => $this->profileId, 'folder_id' => $this->folderId]);
	}


	public function defaultQuery(): array
	{
		return array_filter(['profile_id' => $this->profileId, 'folder_id' => $this->folderId]);
	}
}
