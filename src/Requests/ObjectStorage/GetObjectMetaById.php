<?php

namespace ChrisReedIO\MultiloginSDK\Requests\ObjectStorage;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Get Object meta by ID
 */
class GetObjectMetaById extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/api/v1/resources/{$this->id}/meta";
	}


	/**
	 * @param string $id
	 */
	public function __construct(
		protected string $id,
	) {
	}
}
