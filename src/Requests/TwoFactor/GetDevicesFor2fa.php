<?php

namespace ChrisReedIO\MultiloginSDK\Requests\TwoFactor;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Get Devices for 2FA
 */
class GetDevicesFor2fa extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/user/get_2fa_devices';
    }

    public function __construct(
        protected mixed $deviceId = null,
        protected mixed $totpCode = null,
    ) {}

    public function defaultBody(): array
    {
        return array_filter(['device_id' => $this->deviceId, 'totp_code' => $this->totpCode]);
    }
}
