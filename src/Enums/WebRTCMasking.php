<?php

namespace ChrisReedIO\MultiloginSDK\Enums;

enum WebRTCMasking: string
{
    case NATURAL = 'natural';
    case CUSTOM = 'custom';
    case MASK = 'mask';
    case DISABLED = 'disabled';
}
