<?php

namespace ChrisReedIO\MultiloginSDK\Commands;

use Illuminate\Console\Command;

class MultiloginSDKCommand extends Command
{
    public $signature = 'laravel-multilogin-sdk';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
