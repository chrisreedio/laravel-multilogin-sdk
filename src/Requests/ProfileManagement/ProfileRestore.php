<?php

namespace ChrisReedIO\MultiloginSDK\Requests\ProfileManagement;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Profile Restore
 */
class ProfileRestore extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return '/profile/restore';
    }

    /**
     * @param  string|array  $ids  `Required`. Specify the ID of the profile you would like to restore.
     */
    public function __construct(
        protected string|array $ids,
    ) {}

    public function defaultBody(): array
    {
        return array_filter([
            'ids' => is_array($this->ids) ? $this->ids : [$this->ids],
        ]);
    }
}
