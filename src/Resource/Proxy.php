<?php

namespace ChrisReedIO\MultiloginSDK\Resource;

use ChrisReedIO\MultiloginSDK\Requests\Proxy\FetchProxyData;
use ChrisReedIO\MultiloginSDK\Requests\Proxy\GenerateProxy;
use Saloon\Http\BaseResource;
use Saloon\Http\Response;

class Proxy extends BaseResource
{
    /**
     * @param  string  $country  `Required`. Specify the country code. Use ISO 3166-1 alpha-2 country codes. Send `any` to generate a random proxy. Defaults to `any`.
     * @param  string  $protocol  `Required`. Specify the desired protocol for the proxy IP. Defaults to `http`
     * @param  string  $sessionType  `Required`. Specify the desired session type. Defaults to `sticky`.
     * @param  string  $region  `Optional`. Specify the region or leave as empty string. Use snake_case for specifying the region.
     * @param  string  $city  `Optional`. Specify the city or leave as empty string. Use snake_case for specifying the city.
     * @param  string  $ipttl  `Optional`. Specify the IP time-to-live value in seconds. The maximum value is 86400 seconds (24 hours). The value should be provided if `sessionType` is  `rotating`. Defaults to `86400`.
     * @param  string  $count  `Optional`. Specify the number of IPs to generate. Defaults to `1`.
     * @param  string  $xStrictMode  Default to false. If set to true, you must specify values for all required parameters.
     */
    public function generateProxy(
        ?string $country = null,
        ?string $protocol = null,
        ?string $sessionType = null,
        ?string $region = null,
        ?string $city = null,
        ?string $ipttl = null,
        ?string $count = null,
        ?string $xStrictMode = null,
    ): Response {
        return $this->connector->send(new GenerateProxy($country, $protocol, $sessionType, $region, $city, $ipttl, $count, $xStrictMode));
    }

    public function fetchProxyData(?string $contentType = null, ?string $accept = null): Response
    {
        return $this->connector->send(new FetchProxyData($contentType, $accept));
    }
}
