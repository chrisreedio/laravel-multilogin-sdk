<?php

namespace ChrisReedIO\MultiloginSDK\Requests\ProfileManagement;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Profile Summary
 */
class ProfileSummary extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/profile/summary";
	}


	/**
	 * @param null|string $metaId `Required`. Specify the profile id.
	 */
	public function __construct(
		protected ?string $metaId = null,
	) {
	}


	public function defaultQuery(): array
	{
		return array_filter(['meta_id' => $this->metaId]);
	}


	public function defaultHeaders(): array
	{
		return array_filter([]);
	}
}
