<?php

namespace ChrisReedIO\MultiloginSDK\Requests\Proxy;

use ChrisReedIO\MultiloginSDK\Requests\BaseRequest;
use Saloon\Enums\Method;

/**
 * Get Cities
 */
class GetCities extends BaseRequest
{
    protected Method $method = Method::GET;

    protected ?string $dataSubKey = 'cities';

    public function resolveEndpoint(): string
    {
        return '/proxynm/locations/cities';
    }

    /**
     * @param  null|string  $region_code  `Optional`. Filter cities by region code. Use snake_case for specifying the region.
     * @param  null|string  $ordering  `Optional`. Specify the ordering for the results. Defaults to `name`.
     * @param  null|int  $limit  `Optional`. Specify the number of results to return. Defaults to `1500`.
     */
    public function __construct(
        protected ?string $region_code = null,
        protected ?string $ordering = null,
        protected ?int $limit = null,
    ) {}

    public function defaultQuery(): array
    {
        return array_filter([
            'region_code' => $this->region_code,
            'ordering' => $this->ordering,
            'limit' => $this->limit,
        ]);
    }
}
