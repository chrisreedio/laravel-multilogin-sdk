<?php

namespace ChrisReedIO\MultiloginSDK\Requests\PreMadeCookies;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Create Cookies Metadata
 */
class CreateCookiesMetadata extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return '/api/v1/cookies/metadata';
    }

    /**
     * @param  string  $profileId  `Required`
     * @param  string  $targetWebsite  `Required`. Defaults to `mix`.
     * @param  bool  $xStrictMode  Default to false. If set to true, you must specify values for all required parameters.
     */
    public function __construct(
        protected string $profileId,
        protected string $targetWebsite = 'mix',
        protected bool $xStrictMode = false,
    ) {}

    public function defaultBody(): array
    {
        return array_filter([
            'profile_id' => $this->profileId,
            'target_website' => $this->targetWebsite,
        ]);
    }

    public function defaultHeaders(): array
    {
        return array_filter(['X-Strict-Mode' => $this->xStrictMode]);
    }
}
