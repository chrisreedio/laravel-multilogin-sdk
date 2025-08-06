<?php

namespace ChrisReedIO\MultiloginSDK\Requests\ObjectStorage;

use DateTime;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * List of Objects per profile
 */
class ListOfObjectsPerProfile extends Request implements HasBody
{
	use HasJsonBody;

	protected Method $method = Method::POST;


	public function resolveEndpoint(): string
	{
		return "/api/v1/resources/profile_object_usages";
	}


	/**
	 * @param null|string $objectType `Required`. Specify the object type.
	 * @param null|string $profileId `Required`. Specify the profile id you want to check.
	 */
	public function __construct(
		protected ?string $objectType = null,
		protected ?string $profileId = null,
	) {
	}


	public function defaultQuery(): array
	{
		return array_filter(['object_type' => $this->objectType, 'profile_id' => $this->profileId]);
	}
}
