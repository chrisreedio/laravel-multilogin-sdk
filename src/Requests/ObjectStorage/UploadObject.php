<?php

namespace ChrisReedIO\MultiloginSDK\Requests\ObjectStorage;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Upload Object
 */
class UploadObject extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return '/api/v1/object_storage/upload';
    }

    /**
     * @param  null|mixed  $objectTypeId
     * @param  null|mixed  $objectPath
     * @param  null|mixed  $storageType
     * @param  null|mixed  $objectMeta
     * @param  null|mixed  $encrypt
     * @param  null|string  $objectTypeId  `Required`. The ID of the object type
     * @param  null|string  $objectPath  `Required`. The path of the object.
     * @param  null|string  $storageType  `Required`. The type of storage.
     * @param  null|string  $objectMeta  `Optional`. The object meta data.
     * @param  null|string  $encrypt  `Optional`. Encryption value
     */
    public function __construct(
        protected ?string $objectTypeId = null,
        protected ?string $objectPath = null,
        protected ?string $storageType = null,
        protected ?string $objectMeta = null,
        protected ?string $encrypt = null,
    ) {}

    public function defaultBody(): array
    {
        return array_filter([
            'object_type_id' => $this->objectTypeId,
            'object_path' => $this->objectPath,
            'storage_type' => $this->storageType,
            'object_meta' => $this->objectMeta,
            'encrypt' => $this->encrypt,
        ]);
    }

    public function defaultQuery(): array
    {
        return array_filter([
            'object_type_id' => $this->objectTypeId,
            'object_path' => $this->objectPath,
            'storage_type' => $this->storageType,
            'object_meta' => $this->objectMeta,
            'encrypt' => $this->encrypt,
        ]);
    }
}
