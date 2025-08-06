<?php

namespace ChrisReedIO\MultiloginSDK\Requests\ObjectStorage;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Cloud to Local
 */
class CloudToLocal extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return '/api/v1/object_storage/local_to_cloud';
    }

    /**
     * @param  null|mixed  $objectId
     * @param  null|string  $objectId  `Required`. Specify the id of the object.
     */
    public function __construct(
        protected ?string $objectId = null,
    ) {}

    public function defaultBody(): array
    {
        return array_filter(['object_id' => $this->objectId]);
    }

    public function defaultQuery(): array
    {
        return array_filter(['object_id' => $this->objectId]);
    }
}
