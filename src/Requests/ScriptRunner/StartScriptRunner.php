<?php

namespace ChrisReedIO\MultiloginSDK\Requests\ScriptRunner;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Start Script Runner
 */
class StartScriptRunner extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return '/api/v1/run_script';
    }

    /**
     * @param  null|string  $scriptFile  `Required`. Specify the scrip file to execute.
     * @param  null|string  $profileIds  `Required`. Specify profiles and launch mode.
     */
    public function __construct(
        protected ?string $scriptFile = null,
        protected ?string $profileIds = null,
    ) {}

    public function defaultQuery(): array
    {
        return array_filter(['script_file' => $this->scriptFile, 'profile_ids' => $this->profileIds]);
    }

    public function defaultHeaders(): array
    {
        return array_filter([]);
    }
}
