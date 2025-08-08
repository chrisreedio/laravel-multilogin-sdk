<?php

namespace ChrisReedIO\MultiloginSDK\Requests\Proxy;

use ChrisReedIO\MultiloginSDK\Requests\BaseRequest;
use Illuminate\Support\Str;
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
    ) {
        // If region code is provided, convert it to snake case
        if ($this->region_code) {
            $this->region_code = Str::snake($this->region_code);
        }
    }

    public function defaultQuery(): array
    {
        return array_filter([
            'region_code' => $this->region_code,
            'ordering' => $this->ordering,
            'limit' => $this->limit,
        ]);
    }
}
