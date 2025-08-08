<?php

namespace ChrisReedIO\MultiloginSDK\Requests\ProfileManagement;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Profile Summary
 */
class ProfileSummary extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/profile/summary';
    }

    /**
     * @param  string  $metaId  `Required`. Specify the profile id.
     */
    public function __construct(
        protected string $metaId,
    ) {}

    public function defaultBody(): array
    {
        return array_filter([
            'meta_id' => $this->metaId,
        ]);
    }
}
