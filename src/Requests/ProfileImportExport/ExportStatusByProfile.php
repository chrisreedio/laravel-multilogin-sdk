<?php

namespace ChrisReedIO\MultiloginSDK\Requests\ProfileImportExport;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Export Status by Profile
 */
class ExportStatusByProfile extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/api/v1/profile/exports/{$this->exportId}/status";
    }

    public function __construct(
        protected string $exportId,
    ) {}
}
