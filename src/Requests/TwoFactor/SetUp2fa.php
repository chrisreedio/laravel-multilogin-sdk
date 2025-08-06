<?php

namespace ChrisReedIO\MultiloginSDK\Requests\TwoFactor;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Set up 2FA
 */
class SetUp2fa extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return '/user/setup_2fa';
    }

    /**
     * @param  null|mixed  $deviceName
     * @param  null|string  $deviceName  `Required`. This is the name of the device you want to set up 2FA on.
     */
    public function __construct(
        protected ?string $deviceName = null,
    ) {}

    public function defaultBody(): array
    {
        return array_filter(['device_name' => $this->deviceName]);
    }

    public function defaultQuery(): array
    {
        return array_filter(['device_name' => $this->deviceName]);
    }
}
