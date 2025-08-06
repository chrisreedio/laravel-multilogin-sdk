<?php

namespace ChrisReedIO\MultiloginSDK\Requests\ObjectStorage;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Download Object
 */
class DownloadObject extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/api/v1/object_storage/<id_upload>/download';
    }

    /**
     * @param  null|string  $idUpload  `Required`. Specify the id of the object.
     */
    public function __construct(
        protected ?string $idUpload = null,
    ) {}

    public function defaultQuery(): array
    {
        return array_filter(['id_upload' => $this->idUpload]);
    }
}
