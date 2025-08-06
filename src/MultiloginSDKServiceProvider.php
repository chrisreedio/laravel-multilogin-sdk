<?php

namespace ChrisReedIO\MultiloginSDK;

use ChrisReedIO\MultiloginSDK\Commands\MultiloginSDKCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class MultiloginSDKServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('laravel-multilogin-sdk')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_laravel_multilogin_sdk_table')
            ->hasCommand(MultiloginSDKCommand::class);
    }
}
