<?php

namespace ChrisReedIO\MultiloginSDK\Requests\ProfileManagement;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Profile Move
 */
class ProfileMove extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return '/profile/move';
    }

    /**
     * @param  string  $destFolderId  `Required`. Specify the folder, to which profiles will be moved.
     * @param  string|array  $ids  `Required`. Provide a list of profiles to be moved. Max number of IDs is 20.
     */
    public function __construct(
        protected string $destFolderId,
        protected string|array $ids,
    ) {}

    public function defaultBody(): array
    {
        $ids = is_array($this->ids) ? $this->ids : [$this->ids];

        return array_filter([
            'dest_folder_id' => $this->destFolderId,
            'ids' => $ids,
        ]);
    }
}
