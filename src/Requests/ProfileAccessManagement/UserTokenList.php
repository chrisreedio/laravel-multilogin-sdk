<?php

namespace ChrisReedIO\MultiloginSDK\Requests\ProfileAccessManagement;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * User Token List
 */
class UserTokenList extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/user/tokens_list';
    }

    public function __construct() {}

    public function defaultHeaders(): array
    {
        return array_filter([]);
    }
}
