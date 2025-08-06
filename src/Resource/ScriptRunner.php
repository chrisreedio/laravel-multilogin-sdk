<?php

namespace ChrisReedIO\MultiloginSDK\Resource;

use ChrisReedIO\MultiloginSDK\Requests\ScriptRunner\ScriptList;
use ChrisReedIO\MultiloginSDK\Requests\ScriptRunner\StartBrowserProfileWithSelenium;
use ChrisReedIO\MultiloginSDK\Requests\ScriptRunner\StartScriptRunner;
use ChrisReedIO\MultiloginSDK\Requests\ScriptRunner\StopScriptRunner;
use Saloon\Http\BaseResource;
use Saloon\Http\Response;

class ScriptRunner extends BaseResource
{
    public function startBrowserProfileWithSelenium(
        string $folderId,
        string $profileId,
        ?string $automationType = null,
        ?string $accept = null,
        ?string $authorization = null,
    ): Response {
        return $this->connector->send(new StartBrowserProfileWithSelenium($folderId, $profileId, $automationType, $accept, $authorization));
    }

    /**
     * @param  string  $scriptFile  `Required`. Specify the scrip file to execute.
     * @param  string  $profileIds  `Required`. Specify profiles and launch mode.
     */
    public function startScriptRunner(
        ?string $scriptFile = null,
        ?string $profileIds = null,
        ?string $accept = null,
        ?string $authorization = null,
    ): Response {
        return $this->connector->send(new StartScriptRunner($scriptFile, $profileIds, $accept, $authorization));
    }

    public function stopScriptRunner(
        mixed $profileIds = null,
        ?string $accept = null,
        ?string $authorization = null,
    ): Response {
        return $this->connector->send(new StopScriptRunner($profileIds, $accept, $authorization));
    }

    public function scriptList(?string $accept = null, ?string $authorization = null): Response
    {
        return $this->connector->send(new ScriptList($accept, $authorization));
    }
}
