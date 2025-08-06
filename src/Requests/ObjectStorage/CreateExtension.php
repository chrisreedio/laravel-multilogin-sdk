<?php

namespace ChrisReedIO\MultiloginSDK\Requests\ObjectStorage;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Create Extension
 */
class CreateExtension extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return '/api/v1/create_extension_from_url';
    }

    /**
     * @param  null|mixed  $url
     * @param  null|mixed  $browserType
     * @param  null|mixed  $storageType
     * @param  null|string  $url  `Required`. The url to the extension.
     * @param  null|string  $browserType  `Required`. Specify the browser type. Note that the browser type should be the same as the extension you want to use.
     * @param  null|string  $storageType  `Required`, specify the storage type.
     */
    public function __construct(
        protected ?string $url = null,
        protected ?string $browserType = null,
        protected ?string $storageType = null,
    ) {}

    public function defaultBody(): array
    {
        return array_filter(['url' => $this->url, 'browser_type' => $this->browserType, 'storage_type' => $this->storageType]);
    }

    public function defaultQuery(): array
    {
        return array_filter(['url' => $this->url, 'browser_type' => $this->browserType, 'storage_type' => $this->storageType]);
    }
}
