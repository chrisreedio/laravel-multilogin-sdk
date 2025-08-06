<?php

namespace ChrisReedIO\MultiloginSDK\Requests\ProfileManagement;

use DateTime;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Profile Clone
 */
class ProfileClone extends Request implements HasBody
{
	use HasJsonBody;

	protected Method $method = Method::POST;


	public function resolveEndpoint(): string
	{
		return "/profile/clone";
	}


	/**
	 * @param null|string $profileId `Required`. Specify the ID of the original profile.
	 * @param null|string $times `Required`. Specify the number of profiles you would like to clone. Defaults to `1`.
	 * @param null|string $xStrictMode Default to false. If set to true, you must specify values for all required parameters.
	 */
	public function __construct(
		protected ?string $profileId = null,
		protected ?string $times = null,
		protected ?string $xStrictMode = null,
	) {
	}


	public function defaultQuery(): array
	{
		return array_filter(['profile_id' => $this->profileId, 'times' => $this->times]);
	}


	public function defaultHeaders(): array
	{
		return array_filter(['X-Strict-Mode' => $this->xStrictMode]);
	}
}
