<?php

namespace ChrisReedIO\MultiloginSDK\Enums;

enum AutomationType: string
{
    case SELENIUM = 'selenium';
    case PLAYWRIGHT = 'playwright';
    case PUPPETEER = 'puppeteer';
}
