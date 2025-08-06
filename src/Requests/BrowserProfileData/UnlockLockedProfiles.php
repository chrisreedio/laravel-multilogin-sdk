<?php

namespace ChrisReedIO\MultiloginSDK\Requests\BrowserProfileData;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Unlock Locked Profiles
 */
class UnlockLockedProfiles extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/bpds/profile/unlock_profiles';
    }

    /**
     * @param  null|mixed  $ids
     * @param  null|string  $ids  `Optional`. Specify the ID of the profile to unlock. To unlock all the profile, call the endpoint without the body.
     */
    public function __construct(
        protected ?string $ids = null,
    ) {}

    public function defaultBody(): array
    {
        return array_filter(['ids' => $this->ids]);
    }

    public function defaultQuery(): array
    {
        return array_filter(['ids' => $this->ids]);
    }

    public function defaultHeaders(): array
    {
        return array_filter([]);
    }
}
