<?php

namespace ChrisReedIO\MultiloginSDK\Enums;

enum ProxyType: string
{
    case HTTP = 'http';
    case HTTPS = 'https';
    case SOCKS5 = 'socks5';
}
