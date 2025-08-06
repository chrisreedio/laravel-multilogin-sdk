<?php

namespace ChrisReedIO\MultiloginSDK\Requests\ProfileImportExport;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Profile Import
 */
class ProfileImport extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return '/api/v1/profile/import';
    }

    /**
     * @param  null|string  $importPath  `Required`. Specify the path to the profile in the zip format.
     * @param  null|string  $isLocal  `Required`. Specify the type of the imported profile.
     */
    public function __construct(
        protected ?string $importPath = null,
        protected ?string $isLocal = null,
    ) {}

    public function defaultQuery(): array
    {
        return array_filter(['import_path' => $this->importPath, 'is_local' => $this->isLocal]);
    }
}
