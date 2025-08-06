<?php

namespace ChrisReedIO\MultiloginSDK\Requests\TwoFactor;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Set up new device for 2FA
 */
class SetUpNewDeviceFor2fa extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return '/user/add_2fa_device';
    }

    /**
     * @param  null|mixed  $deviceId
     * @param  null|mixed  $totpCode
     * @param  null|string  $deviceId  `Required`. This is the id from the response of "Set up 2FA".
     * @param  null|string  $totpCode  `Required`. This is the code from your 2FA app.
     */
    public function __construct(
        protected ?string $deviceId = null,
        protected ?string $totpCode = null,
    ) {}

    public function defaultBody(): array
    {
        return array_filter(['device_id' => $this->deviceId, 'totp_code' => $this->totpCode]);
    }

    public function defaultQuery(): array
    {
        return array_filter(['device_id' => $this->deviceId, 'totp_code' => $this->totpCode]);
    }
}
