<?php

namespace ChrisReedIO\MultiloginSDK\Requests\ProfileManagement;

use ChrisReedIO\MultiloginSDK\Data\ProfilePartialUpdateParameters;
use ChrisReedIO\MultiloginSDK\Data\ProxyData;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

class ProfilePartialUpdate extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return '/profile/partial_update';
    }

    public function __construct(
        protected string $profileId,
        protected ?string $name = null,
        protected ?bool $autoUpdateCore = null,
        protected ?int $coreVersion = null,
        protected ?int $coreMinorVersion = null,
        protected ?string $tags = null,
        protected ?ProxyData $proxy = null,
        protected ?array $customStartUrls = null,
        protected ?string $notes = null,
        protected ?ProfilePartialUpdateParameters $parameters = null,
    ) {}

    public function defaultBody(): array
    {
        return array_filter([
            'profile_id' => $this->profileId,
            'name' => $this->name,
            'auto_update_core' => $this->autoUpdateCore,
            'core_version' => $this->coreVersion,
            'core_minor_version' => $this->coreMinorVersion,
            'tags' => $this->tags,
            'proxy' => $this->proxy?->toArray(),
            'custom_start_urls' => $this->customStartUrls,
            'notes' => $this->notes,
            'parameters' => $this->parameters?->toArray(),
        ], fn ($value) => $value !== null);
    }

    public function defaultHeaders(): array
    {
        return [];
    }
}
