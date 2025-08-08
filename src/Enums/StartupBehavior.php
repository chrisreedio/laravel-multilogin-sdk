<?php

namespace ChrisReedIO\MultiloginSDK\Enums;

enum StartupBehavior: string
{
    case RECOVER = 'recover';
    case CUSTOM = 'custom';
}
