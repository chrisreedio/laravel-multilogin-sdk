<?php

namespace ChrisReedIO\MultiloginSDK\Resource;

use ChrisReedIO\MultiloginSDK\Enums\ProxyProtocol;
use ChrisReedIO\MultiloginSDK\Enums\SessionType;
use ChrisReedIO\MultiloginSDK\Requests\Proxy\FetchProxyData;
use ChrisReedIO\MultiloginSDK\Requests\Proxy\GenerateProxy;
use ChrisReedIO\MultiloginSDK\Requests\Proxy\GetCities;
use ChrisReedIO\MultiloginSDK\Requests\Proxy\GetRegions;
use Saloon\Http\BaseResource;
use Saloon\Http\Response;

class Proxy extends BaseResource
{
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
    public function generate(
        ?string $country = null,
        ?string $region = null,
        ?string $city = null,
        ?SessionType $sessionType = SessionType::STICKY,
        ?string $ipttl = null,
        ?string $count = null,
        ?ProxyProtocol $protocol = ProxyProtocol::HTTP,
        ?string $xStrictMode = null,
    ): Response {
        return $this->connector->send(new GenerateProxy($country, $region, $city, $sessionType, $ipttl, $count, $protocol, $xStrictMode));
    }

    public function fetchProxyData(?string $contentType = null, ?string $accept = null): Response
    {
        return $this->connector->send(new FetchProxyData($contentType, $accept));
    }

    /**
     * @param  null|string  $country_code  `Optional`. Filter regions by country code. Use ISO 3166-1 alpha-2 country codes.
     * @param  null|string  $ordering  `Optional`. Specify the ordering for the results. Defaults to `name`.
     * @param  null|int  $limit  `Optional`. Specify the number of results to return. Defaults to `100`.
     */
    public function regions(
        ?string $country_code = null,
        ?string $ordering = null,
        ?int $limit = null,
    ): Response {
        return $this->connector->send(new GetRegions($country_code, $ordering, $limit));
    }

    /**
     * @param  null|string  $region_code  `Optional`. Filter cities by region code. Use snake_case for specifying the region.
     * @param  null|string  $ordering  `Optional`. Specify the ordering for the results. Defaults to `name`.
     * @param  null|int  $limit  `Optional`. Specify the number of results to return. Defaults to `1500`.
     */
    public function cities(
        ?string $region_code = null,
        ?string $ordering = null,
        ?int $limit = null,
    ): Response {
        return $this->connector->send(new GetCities($region_code, $ordering, $limit));
    }
}
