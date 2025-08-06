<?php

namespace ChrisReedIO\MultiloginSDK\Requests\TwoFactor;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Revoke device for 2FA
 */
class RevokeDeviceFor2fa extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return '/user/revoke_2fa_device';
    }

    /**
     * @param  null|mixed  $deviceId
     * @param  null|string  $deviceId  `Required`. This is the id from the response of "Set up 2FA" or from "Get Devices for 2FA.
     */
    public function __construct(
        protected ?string $deviceId = null,
    ) {}

    public function defaultBody(): array
    {
        return array_filter(['device_id' => $this->deviceId]);
    }

    public function defaultQuery(): array
    {
        return array_filter(['device_id' => $this->deviceId]);
    }
}
