<?php

namespace ChrisReedIO\MultiloginSDK\Requests\PreMadeCookies;

use DateTime;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Create Cookies Metadata
 */
class CreateCookiesMetadata extends Request implements HasBody
{
	use HasJsonBody;

	protected Method $method = Method::POST;


	public function resolveEndpoint(): string
	{
		return "/api/v1/cookies/metadata";
	}


	/**
	 * @param null|mixed $profileId
	 * @param null|mixed $targetWebsite
	 * @param null|string $profileId `Required`
	 * @param null|string $targetWebsite `Required`. Defaults to `mix`.
	 * @param null|string $xStrictMode Default to false. If set to true, you must specify values for all required parameters.
	 */
	public function __construct(
		protected ?string $profileId = null,
		protected ?string $targetWebsite = null,
		protected ?string $xStrictMode = null,
	) {
	}


	public function defaultBody(): array
	{
		return array_filter(['profile_id' => $this->profileId, 'target_website' => $this->targetWebsite]);
	}


	public function defaultQuery(): array
	{
		return array_filter(['profile_id' => $this->profileId, 'target_website' => $this->targetWebsite]);
	}


	public function defaultHeaders(): array
	{
		return array_filter(['X-Strict-Mode' => $this->xStrictMode]);
	}
}
