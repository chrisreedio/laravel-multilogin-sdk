<?php

namespace ChrisReedIO\MultiloginSDK\Requests\TwoFactor;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Disable 2FA
 */
class Disable2fa extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return '/user/disable_2fa';
    }

    /**
     * @param  null|string  $enable  `Required`. This will enable or disable 2FA for the workspace.
     */
    public function __construct(
        protected ?string $enable = null,
    ) {}

    public function defaultQuery(): array
    {
        return array_filter(['enable' => $this->enable]);
    }
}
