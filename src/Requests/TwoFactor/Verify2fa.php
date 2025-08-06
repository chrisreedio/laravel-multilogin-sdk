<?php

namespace ChrisReedIO\MultiloginSDK\Requests\TwoFactor;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Verify 2FA
 */
class Verify2fa extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return '/user/verify_2fa_otp';
    }

    /**
     * @param  null|string  $tempToken  `Required`. After 2FA is enabled, when the user logs in he will get a temporary token instead of the normal token.
     * @param  null|string  $totpCode  `Required`. This is the code from your 2FA app.
     * @param  null|string  $isBackup  `Required`. If the values is set to `false`, the user needs to put the OTP code from app inside the "totp_code", otherwise the backup codes needs to be added.
     */
    public function __construct(
        protected ?string $tempToken = null,
        protected ?string $totpCode = null,
        protected ?string $isBackup = null,
    ) {}

    public function defaultQuery(): array
    {
        return array_filter(['temp_token' => $this->tempToken, 'totp_code' => $this->totpCode, 'is_backup' => $this->isBackup]);
    }
}
