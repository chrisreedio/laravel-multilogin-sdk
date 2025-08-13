<?php

namespace ChrisReedIO\MultiloginSDK\Requests\ProfileAccessManagement;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * User Revoke Token
 */
class UserRevokeToken extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return '/user/revoke_tokens';
    }

    /**
     * @param  ?string  $token  `Optional`. Specify the token to revoke. Defaults to `current token`.
     * @param  bool  $isAutomation  `Optional`. Specify the token type to revoke. Defaults to `false`.
     * @param  bool  $xStrictMode  Default to false. If set to true, you must specify values for all required parameters.
     */
    public function __construct(
        protected ?string $token = null,
        protected bool $isAutomation = false,
        protected bool $xStrictMode = false,
    ) {}

    public function defaultBody(): array
    {
        return array_filter([
            'token' => $this->token,
            'is_automation' => $this->isAutomation,
        ]);
    }

    public function defaultHeaders(): array
    {
        return array_filter(['X-Strict-Mode' => $this->xStrictMode]);
    }
}
