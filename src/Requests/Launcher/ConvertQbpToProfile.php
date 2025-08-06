<?php

namespace ChrisReedIO\MultiloginSDK\Requests\Launcher;

use DateTime;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Convert QBP to Profile
 */
class ConvertQbpToProfile extends Request implements HasBody
{
	use HasJsonBody;

	protected Method $method = Method::POST;


	public function resolveEndpoint(): string
	{
		return "/api/v1/profile/quick/save";
	}


	/**
	 * @param null|mixed $data
	 */
	public function __construct(
		protected mixed $data = null,
	) {
	}


	public function defaultBody(): array
	{
		return array_filter(['data' => $this->data]);
	}
}
