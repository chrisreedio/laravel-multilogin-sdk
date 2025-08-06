<?php

namespace ChrisReedIO\MultiloginSDK;

use ChrisReedIO\MultiloginSDK\Resource\BookmarkManagement;
use ChrisReedIO\MultiloginSDK\Resource\BrowserProfileData;
use ChrisReedIO\MultiloginSDK\Resource\Launcher;
use ChrisReedIO\MultiloginSDK\Resource\ObjectStorage;
use ChrisReedIO\MultiloginSDK\Resource\PreMadeCookies;
use ChrisReedIO\MultiloginSDK\Resource\ProfileAccessManagement;
use ChrisReedIO\MultiloginSDK\Resource\ProfileImportExport;
use ChrisReedIO\MultiloginSDK\Resource\ProfileManagement;
use ChrisReedIO\MultiloginSDK\Resource\Proxy;
use ChrisReedIO\MultiloginSDK\Resource\ScriptRunner;
use ChrisReedIO\MultiloginSDK\Resource\TwoFactor;
use Saloon\Http\Connector;

/**
 * Multilogin X API
 */
class MultiloginSDK extends Connector
{
    public function __construct() {}

    public function resolveBaseUrl(): string
    {
        return 'https://api.multilogin.com';
    }

    public function bookmarkManagement(): BookmarkManagement
    {
        return new BookmarkManagement($this);
    }

    public function browserProfileData(): BrowserProfileData
    {
        return new BrowserProfileData($this);
    }

    public function launcher(): Launcher
    {
        return new Launcher($this);
    }

    public function objectStorage(): ObjectStorage
    {
        return new ObjectStorage($this);
    }

    public function preMadeCookies(): PreMadeCookies
    {
        return new PreMadeCookies($this);
    }

    public function profileAccessManagement(): ProfileAccessManagement
    {
        return new ProfileAccessManagement($this);
    }

    public function profileImportExport(): ProfileImportExport
    {
        return new ProfileImportExport($this);
    }

    public function profileManagement(): ProfileManagement
    {
        return new ProfileManagement($this);
    }

    public function proxy(): Proxy
    {
        return new Proxy($this);
    }

    public function scriptRunner(): ScriptRunner
    {
        return new ScriptRunner($this);
    }

    public function twoFactor(): TwoFactor
    {
        return new TwoFactor($this);
    }
}
