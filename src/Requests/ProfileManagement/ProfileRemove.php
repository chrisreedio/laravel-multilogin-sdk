<?php

namespace ChrisReedIO\MultiloginSDK\Requests\ProfileManagement;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Profile Remove
 */
class ProfileRemove extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return '/profile/remove';
    }

    /**
     * @param  string|array  $ids  `Required`. Specify the ID of the profile to be deleted.
     * @param  bool  $permanently  `Required`. Specify the value to delete profiles perminantly or not. Defaults to `false`.
     * @param  bool  $xStrictMode  Default to false. If set to true, you must specify values for all required parameters.
     */
    public function __construct(
        protected string|array $ids,
        protected bool $permanently = false,
        protected bool $xStrictMode = false,
    ) {}

    public function defaultBody(): array
    {
        $ids = is_array($this->ids) ? $this->ids : [$this->ids];

        return array_filter([
            'ids' => $ids,
            'permanently' => $this->permanently,
        ]);
    }

    public function defaultHeaders(): array
    {
        return array_filter(['X-Strict-Mode' => $this->xStrictMode]);
    }
}
