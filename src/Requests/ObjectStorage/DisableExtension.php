<?php

namespace ChrisReedIO\MultiloginSDK\Requests\ObjectStorage;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Disable Extension
 */
class DisableExtension extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return '/api/v1/resources/<object_id>/disable_for_profiles';
    }

    /**
     * @param  null|mixed  $profileIds
     * @param  null|string  $profileIds  `Required`. Specify the profiles you want to disable the extension on.
     * @param  null|string  $objectId  `Required`. Specify the id of the extension you want to disable.
     */
    public function __construct(
        protected ?string $profileIds = null,
        protected ?string $objectId = null,
    ) {}

    public function defaultBody(): array
    {
        return array_filter(['profile_ids' => $this->profileIds]);
    }

    public function defaultQuery(): array
    {
        return array_filter(['profile_ids' => $this->profileIds, 'object_id' => $this->objectId]);
    }
}
