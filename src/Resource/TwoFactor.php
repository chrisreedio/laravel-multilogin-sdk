<?php

namespace ChrisReedIO\MultiloginSDK\Resource;

use ChrisReedIO\MultiloginSDK\Requests\TwoFactor\Disable2fa;
use ChrisReedIO\MultiloginSDK\Requests\TwoFactor\Enable2fa;
use ChrisReedIO\MultiloginSDK\Requests\TwoFactor\EnableDisable2faForWorkspace;
use ChrisReedIO\MultiloginSDK\Requests\TwoFactor\GetBackupCodesFor2fa;
use ChrisReedIO\MultiloginSDK\Requests\TwoFactor\GetDevicesFor2fa;
use ChrisReedIO\MultiloginSDK\Requests\TwoFactor\RevokeDeviceFor2fa;
use ChrisReedIO\MultiloginSDK\Requests\TwoFactor\SetUp2fa;
use ChrisReedIO\MultiloginSDK\Requests\TwoFactor\SetUpNewDeviceFor2fa;
use ChrisReedIO\MultiloginSDK\Requests\TwoFactor\Verify2fa;
use Saloon\Http\BaseResource;
use Saloon\Http\Response;

class TwoFactor extends BaseResource
{
    /**
     * @param  mixed  $deviceName
     * @param  string  $deviceName  `Required`. This is the name of the device you want to set up 2FA on.
     */
    public function setUp2fa(?string $deviceName = null): Response
    {
        return $this->connector->send(new SetUp2fa($deviceName, $deviceName));
    }

    /**
     * @param  mixed  $deviceId
     * @param  mixed  $totpCode
     * @param  string  $deviceId  `Required`. This is the id from the response of "Set up 2FA".
     * @param  string  $totpCode  `Required`. This is the code from your 2FA app.
     */
    public function enable2fa(?string $deviceId = null, ?string $totpCode = null): Response
    {
        return $this->connector->send(new Enable2fa($deviceId, $totpCode, $deviceId, $totpCode));
    }

    /**
     * @param  string  $tempToken  `Required`. After 2FA is enabled, when the user logs in he will get a temporary token instead of the normal token.
     * @param  string  $totpCode  `Required`. This is the code from your 2FA app.
     * @param  string  $isBackup  `Required`. If the values is set to `false`, the user needs to put the OTP code from app inside the "totp_code", otherwise the backup codes needs to be added.
     */
    public function verify2fa(?string $tempToken = null, ?string $totpCode = null, ?string $isBackup = null): Response
    {
        return $this->connector->send(new Verify2fa($tempToken, $totpCode, $isBackup));
    }

    /**
     * @param  mixed  $deviceId
     * @param  mixed  $totpCode
     * @param  string  $deviceId  `Required`. This is the id from the response of "Set up 2FA".
     * @param  string  $totpCode  `Required`. This is the code from your 2FA app.
     */
    public function setUpNewDeviceFor2fa(?string $deviceId = null, ?string $totpCode = null): Response
    {
        return $this->connector->send(new SetUpNewDeviceFor2fa($deviceId, $totpCode, $deviceId, $totpCode));
    }

    public function getDevicesFor2fa(mixed $deviceId = null, mixed $totpCode = null): Response
    {
        return $this->connector->send(new GetDevicesFor2fa($deviceId, $totpCode));
    }

    public function getBackupCodesFor2fa(mixed $deviceId = null, mixed $totpCode = null): Response
    {
        return $this->connector->send(new GetBackupCodesFor2fa($deviceId, $totpCode));
    }

    /**
     * @param  mixed  $deviceId
     * @param  string  $deviceId  `Required`. This is the id from the response of "Set up 2FA" or from "Get Devices for 2FA.
     */
    public function revokeDeviceFor2fa(?string $deviceId = null): Response
    {
        return $this->connector->send(new RevokeDeviceFor2fa($deviceId, $deviceId));
    }

    /**
     * @param  string  $enable  `Required`. This will enable or disable 2FA for the workspace.
     */
    public function enableDisable2faForWorkspace(?string $enable = null): Response
    {
        return $this->connector->send(new EnableDisable2faForWorkspace($enable));
    }

    /**
     * @param  string  $enable  `Required`. This will enable or disable 2FA for the workspace.
     */
    public function disable2fa(?string $enable = null): Response
    {
        return $this->connector->send(new Disable2fa($enable));
    }
}
