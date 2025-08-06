<?php

namespace ChrisReedIO\MultiloginSDK\Requests\ObjectStorage;

use DateTime;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Enable Extension
 */
class EnableExtension extends Request implements HasBody
{
	use HasJsonBody;

	protected Method $method = Method::POST;


	public function resolveEndpoint(): string
	{
		return "/api/v1/resources/<object_id>/enable_for_profiles";
	}


	/**
	 * @param null|mixed $profileIds
	 * @param null|string $objectId `Required`. Specify the object id of the extension.
	 * @param null|string $profileIds `Required`. Specify the profiles you want to apply the extension on.
	 */
	public function __construct(
		protected ?string $profileIds = null,
		protected ?string $objectId = null,
	) {
	}


	public function defaultBody(): array
	{
		return array_filter(['profile_ids' => $this->profileIds]);
	}


	public function defaultQuery(): array
	{
		return array_filter(['object_id' => $this->objectId, 'profile_ids' => $this->profileIds]);
	}
}
