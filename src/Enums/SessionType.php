<?php

namespace ChrisReedIO\MultiloginSDK\Enums;

enum SessionType: string
{
    case STICKY = 'sticky';
    case ROTATING = 'rotating';
}
