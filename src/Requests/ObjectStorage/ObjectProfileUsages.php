<?php

namespace ChrisReedIO\MultiloginSDK\Requests\ObjectStorage;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Object Profile Usages
 */
class ObjectProfileUsages extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/api/v1/resources/object_profile_usages";
	}


	/**
	 * @param null|string $objectId `Required`
	 */
	public function __construct(
		protected ?string $objectId = null,
	) {
	}


	public function defaultQuery(): array
	{
		return array_filter(['object_id' => $this->objectId]);
	}
}
