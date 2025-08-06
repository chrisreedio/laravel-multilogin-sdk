<?php

namespace ChrisReedIO\MultiloginSDK\Requests\ObjectStorage;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Delete Object
 */
class DeleteObject extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/api/v1/resources/{$this->id}/delete";
    }

    /**
     * @param  null|string  $permanently  `Optional`. Specify the boolean value to either delete the object to trashbin or permanently. Default to `false`.
     */
    public function __construct(
        protected string $id,
        protected ?string $permanently = null,
    ) {}

    public function defaultQuery(): array
    {
        return array_filter(['permanently' => $this->permanently]);
    }
}
