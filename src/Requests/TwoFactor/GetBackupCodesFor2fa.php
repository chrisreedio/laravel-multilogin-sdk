<?php

namespace ChrisReedIO\MultiloginSDK\Requests\TwoFactor;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Get Backup Codes for 2FA
 */
class GetBackupCodesFor2fa extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/user/backup_codes';
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
