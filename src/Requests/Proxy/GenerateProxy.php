<?php

namespace ChrisReedIO\MultiloginSDK\Requests\Proxy;

use ChrisReedIO\MultiloginSDK\Enums\MultiloginDomain;
use ChrisReedIO\MultiloginSDK\Enums\ProxyProtocol;
use ChrisReedIO\MultiloginSDK\Enums\SessionType;
use ChrisReedIO\MultiloginSDK\Requests\BaseRequest;
use Illuminate\Support\Str;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Generate Proxy
 */
class GenerateProxy extends BaseRequest implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return MultiloginDomain::PROFILE_PROXY->getUrl().'/v1/proxy/connection_url';
    }

    /**
     * @param  string|null  $country  `Optional`. Specify the country code. Use ISO 3166-1 alpha-2 country codes. Send `any` to generate a random proxy. Defaults to `any`.
     * @param  string|null  $region  `Optional`. Specify the region or leave as empty string. Use snake_case for specifying the region.
     * @param  string|null  $city  `Optional`. Specify the city or leave as empty string. Use snake_case for specifying the city.
     * @param  SessionType|null  $sessionType  `Optional`. Specify the desired session type. Defaults to `sticky`.
     * @param  string|null  $ipttl  `Optional`. Specify the IP time-to-live value in seconds. The maximum value is 86400 seconds (24 hours). The value should be provided if `sessionType` is `rotating`. Defaults to `86400`.
     * @param  string|null  $count  `Optional`. Specify the number of IPs to generate. Defaults to `1`.
     * @param  ProxyProtocol|null  $protocol  `Optional`. Specify the desired protocol for the proxy IP. Defaults to `http`.
     * @param  string|null  $xStrictMode  `Optional`. Default to false. If set to true, you must specify values for all required parameters.
     */
    public function __construct(
        protected ?string $country = null,
        protected ?string $region = null,
        protected ?string $city = null,
        protected ?SessionType $sessionType = null,
        protected ?string $ipttl = null,
        protected ?string $count = null,
        protected ?ProxyProtocol $protocol = null,
        protected ?string $xStrictMode = null,
    ) {
        // If country is provided, convert it to snake case
        if ($this->country) {
            $this->country = Str::snake($this->country);
        }

        // If region is provided, convert it to snake case
        if ($this->region) {
            $this->region = Str::snake($this->region);
        }

        // If city is provided, convert it to snake case
        if ($this->city) {
            $this->city = Str::snake($this->city);
        }
    }

    public function defaultBody(): array
    {
        return array_filter([
            'country' => $this->country,
            'protocol' => $this->protocol?->value,
            'sessionType' => $this->sessionType?->value,
            'region' => $this->region,
            'city' => $this->city,
            'IPTTL' => $this->ipttl,
            'count' => $this->count,
        ]);
    }

    public function defaultHeaders(): array
    {
        return array_filter(['X-Strict-Mode' => $this->xStrictMode]);
    }
}
