<?php

namespace ChrisReedIO\MultiloginSDK\Enums;

enum MultiloginDomain: string
{
    case LAUNCHER = 'launcher';
    case API = 'api';
    case APP = 'app';
    case COOKIES = 'cookies';
    case PROFILE_PROXY = 'profile_proxy';

    /**
     * Get the full URL (including port) for this domain.
     */
    public function getUrl(): string
    {
        return match ($this) {
            self::LAUNCHER => config('multilogin-sdk.launcher_url', 'https://launcher.mlx.yt:45001'),
            self::API => 'https://api.multilogin.com:443',
            self::APP => 'https://app.multilogin.com:443',
            self::COOKIES => 'https://cookies.multilogin.com:443',
            self::PROFILE_PROXY => 'https://profile-proxy.multilogin.com:443',
        };
    }
}
