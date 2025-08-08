<?php

namespace ChrisReedIO\MultiloginSDK\Requests\ProfileManagement;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Profile Convert
 */
class ProfileConvert extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return "/api/v1/profile/{$this->profileId}/convert";
    }

    /**
     * @param  string  $profileId  `Required`. Specify the profile id.
     * @param  bool  $convertToLocal  `Required`. True if you want to convert from cloud to local and false otherwise.
     * @param  string  $workspaceId  `Required`. Specify the workspace id.
     */
    public function __construct(
        protected string $profileId,
        protected bool $convertToLocal,
        protected string $workspaceId,
    ) {}

    public function defaultBody(): array
    {
        return array_filter([
            'convert_to_local' => $this->convertToLocal,
            'workspace_id' => $this->workspaceId,
        ]);
    }
}
