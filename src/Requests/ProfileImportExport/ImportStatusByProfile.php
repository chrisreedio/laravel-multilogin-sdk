<?php

namespace ChrisReedIO\MultiloginSDK\Requests\ProfileImportExport;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Import Status by Profile
 */
class ImportStatusByProfile extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/api/v1/profile/imports/{$this->importId}/status";
    }

    public function __construct(
        protected string $importId,
    ) {}
}
