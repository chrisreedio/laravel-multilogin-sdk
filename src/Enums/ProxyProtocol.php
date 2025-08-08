<?php

namespace ChrisReedIO\MultiloginSDK\Enums;

enum ProxyProtocol: string
{
    case HTTP = 'http';
    case HTTPS = 'https';
    case SOCKS5 = 'socks5';
}
