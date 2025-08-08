<?php

namespace ChrisReedIO\MultiloginSDK\Requests\Proxy;

use ChrisReedIO\MultiloginSDK\Requests\BaseRequest;
use Illuminate\Support\Str;
use Saloon\Enums\Method;

/**
 * Get Regions
 */
class GetRegions extends BaseRequest
{
    protected Method $method = Method::GET;

    protected ?string $dataSubKey = 'regions';

    public function resolveEndpoint(): string
    {
        return '/proxynm/locations/regions';
    }

    /**
     * @param  null|string  $country_code  `Optional`. Filter regions by country code. Use ISO 3166-1 alpha-2 country codes.
     * @param  null|string  $ordering  `Optional`. Specify the ordering for the results. Defaults to `name`.
     * @param  null|int  $limit  `Optional`. Specify the number of results to return. Defaults to `100`.
     */
    public function __construct(
        protected ?string $country_code = null,
        protected ?string $ordering = null,
        protected ?int $limit = null,
    ) {
        // If country code is provided, convert it to snake case
        if ($this->country_code) {
            $this->country_code = Str::snake($this->country_code);
            // If it's not 2 characters, throw an error
            if (strlen($this->country_code) !== 2) {
                throw new \Exception('Country code must be 2 characters');
            }
        }
    }

    public function defaultQuery(): array
    {
        return array_filter([
            'country_code' => $this->country_code,
            'ordering' => $this->ordering,
            'limit' => $this->limit,
        ]);
    }
}
