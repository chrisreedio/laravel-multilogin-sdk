<?php

namespace ChrisReedIO\MultiloginSDK\Requests\ProfileManagement;

use ChrisReedIO\MultiloginSDK\Data\ProfileCreateParameters;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

class ProfileUpdate extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return '/profile/update';
    }

    public function __construct(
        protected string $profileId,
        protected string $name,
        protected ProfileCreateParameters $parameters,
        protected ?bool $autoUpdateCore = null,
        protected ?int $coreVersion = null,
        protected ?int $coreMinorVersion = null,
        protected ?string $tags = null,
        protected ?string $notes = null,
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
            'notes' => $this->notes,
            'parameters' => $this->parameters->toArray(),
        ], fn($value) => $value !== null);
    }

    public function defaultHeaders(): array
    {
        return [];
    }
}
