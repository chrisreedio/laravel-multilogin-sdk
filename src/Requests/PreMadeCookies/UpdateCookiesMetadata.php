<?php

namespace ChrisReedIO\MultiloginSDK\Requests\PreMadeCookies;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Update Cookies Metadata
 */
class UpdateCookiesMetadata extends Request
{
    protected Method $method = Method::PUT;

    public function resolveEndpoint(): string
    {
        return '/api/v1/cookies/metadata';
    }

    /**
     * @param  null|mixed  $profileId
     * @param  null|mixed  $targetWebsite
     * @param  null|mixed  $additionalWebsite
     * @param  null|string  $profileId  `Required`
     * @param  null|string  $targetWebsite  `Required`. Defaults to `mix`.
     * @param  null|string  $additionalWebsite  `Optional`
     * @param  null|string  $xStrictMode  Default to false. If set to true, you must specify values for all required parameters.
     */
    public function __construct(
        protected ?string $profileId = null,
        protected ?string $targetWebsite = null,
        protected ?string $additionalWebsite = null,
        protected ?string $xStrictMode = null,
    ) {}

    public function defaultBody(): array
    {
        return array_filter([
            'profile_id' => $this->profileId,
            'target_website' => $this->targetWebsite,
            'additional_website' => $this->additionalWebsite,
        ]);
    }

    public function defaultQuery(): array
    {
        return array_filter([
            'profile_id' => $this->profileId,
            'target_website' => $this->targetWebsite,
            'additional_website' => $this->additionalWebsite,
        ]);
    }

    public function defaultHeaders(): array
    {
        return array_filter(['X-Strict-Mode' => $this->xStrictMode]);
    }
}
