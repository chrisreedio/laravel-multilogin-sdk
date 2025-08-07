<?php

namespace ChrisReedIO\MultiloginSDK\Requests\ProfileManagement;

use Illuminate\Support\Arr;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Profile Metas
 */
class ProfileMetas extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return '/profile/metas';
    }

    /**
     * @param  null|mixed  $ids
     * @param  null|string  $ids  `Required`. Specify the ID of the profile, which metas you would like to fetch.
     */
    public function __construct(
        protected string|array|null $ids = null,
    ) {}

    public function defaultBody(): array
    {
        $ids = Arr::wrap($this->ids);

        return ['ids' => $ids];
    }

    // public function defaultQuery(): array
    // {
    // return array_filter(['ids' => $this->ids]);
    // }

    // public function defaultHeaders(): array
    // {
    //     return array_filter([]);
    // }
}
