<?php

namespace ChrisReedIO\MultiloginSDK\Enums;

enum GeolocationPopup: string
{
    case PROMPT = 'prompt';
    case ALLOW = 'allow';
    case BLOCK = 'block';
}
