<?php

namespace ChrisReedIO\MultiloginSDK\Requests\ProfileManagement;

use DateTime;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Profile Remove
 */
class ProfileRemove extends Request implements HasBody
{
	use HasJsonBody;

	protected Method $method = Method::POST;


	public function resolveEndpoint(): string
	{
		return "/profile/remove";
	}


	/**
	 * @param null|string $ids `Required`. Specify the ID of the profile to be deleted.
	 * @param null|string $permanently `Required`. Specify the value to delete profiles perminantly or not. Defaults to `false`.
	 * @param null|string $xStrictMode Default to false. If set to true, you must specify values for all required parameters.
	 */
	public function __construct(
		protected ?string $ids = null,
		protected ?string $permanently = null,
		protected ?string $xStrictMode = null,
	) {
	}


	public function defaultQuery(): array
	{
		return array_filter(['ids' => $this->ids, 'permanently' => $this->permanently]);
	}


	public function defaultHeaders(): array
	{
		return array_filter(['X-Strict-Mode' => $this->xStrictMode]);
	}
}
