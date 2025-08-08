<?php

namespace ChrisReedIO\MultiloginSDK\Requests\ProfileManagement;

use ChrisReedIO\MultiloginSDK\Data\ProfileCreateParameters;
use ChrisReedIO\MultiloginSDK\Enums\BrowserType;
use ChrisReedIO\MultiloginSDK\Enums\OsType;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

class ProfileCreate extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return '/profile/create';
    }

    public function __construct(
        protected string $name,
        protected BrowserType $browserType,
        protected string $folderId,
        protected ProfileCreateParameters $parameters,
        protected OsType $osType = OsType::WINDOWS,
        protected ?int $coreVersion = null,
        protected ?int $coreMinorVersion = null,
        protected ?int $times = null,
        protected ?string $notes = null,
        protected ?bool $xStrictMode = null,
    ) {}

    public function defaultBody(): array
    {
        return array_filter([
            'name' => $this->name,
            'browser_type' => $this->browserType->value,
            'folder_id' => $this->folderId,
            'os_type' => $this->osType->value,
            'core_version' => $this->coreVersion,
            'core_minor_version' => $this->coreMinorVersion,
            'times' => $this->times,
            'notes' => $this->notes,
            'parameters' => $this->parameters->toArray(),
        ], fn ($value) => $value !== null);
    }

    public function defaultHeaders(): array
    {
        $headers = [];
        if ($this->xStrictMode !== null) {
            $headers['X-Strict-Mode'] = $this->xStrictMode ? 'true' : 'false';
        }

        return $headers;
    }
}
