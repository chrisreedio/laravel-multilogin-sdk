<?php

namespace ChrisReedIO\MultiloginSDK\Requests\ObjectStorage;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Restore Object
 */
class RestoreObject extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/api/v1/resources/{$this->id}/restore";
    }

    public function __construct(
        protected string $id,
    ) {}
}
