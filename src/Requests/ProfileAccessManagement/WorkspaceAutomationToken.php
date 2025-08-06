<?php

namespace ChrisReedIO\MultiloginSDK\Requests\ProfileAccessManagement;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Workspace Automation Token
 */
class WorkspaceAutomationToken extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/workspace/automation_token';
    }

    /**
     * @param  null|string  $expirationPeriod  `Required`. Specify the token lifetime. Defaults to `24h`.
     * @param  null|string  $xStrictMode  Default to false. If set to true, you must specify values for all required parameters.
     */
    public function __construct(
        protected ?string $expirationPeriod = null,
        protected ?string $xStrictMode = null,
    ) {}

    public function defaultQuery(): array
    {
        return array_filter(['expiration_period' => $this->expirationPeriod]);
    }

    public function defaultHeaders(): array
    {
        return array_filter(['X-Strict-Mode' => $this->xStrictMode]);
    }
}
