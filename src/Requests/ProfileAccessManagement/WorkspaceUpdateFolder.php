<?php

namespace ChrisReedIO\MultiloginSDK\Requests\ProfileAccessManagement;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Workspace Update Folder
 */
class WorkspaceUpdateFolder extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return '/workspace/folder_update';
    }

    /**
     * @param  null|mixed  $folderId
     * @param  null|mixed  $name
     * @param  null|mixed  $comment
     * @param  null|string  $folderId  `Required`. Specify the folder ID.
     * @param  null|string  $name  `Required`. Specify the new folder name.
     * @param  null|string  $comment  `Optional`. Add comments if necessary. Defaults to empty string `""`.
     * @param  null|string  $xStrictMode  Default to false. If set to true, you must specify values for all required parameters.
     */
    public function __construct(
        protected ?string $folderId = null,
        protected ?string $name = null,
        protected ?string $comment = null,
        protected ?string $xStrictMode = null,
    ) {}

    public function defaultBody(): array
    {
        return array_filter(['folder_id' => $this->folderId, 'name' => $this->name, 'comment' => $this->comment]);
    }

    public function defaultQuery(): array
    {
        return array_filter(['folder_id' => $this->folderId, 'name' => $this->name, 'comment' => $this->comment]);
    }

    public function defaultHeaders(): array
    {
        return array_filter(['X-Strict-Mode' => $this->xStrictMode]);
    }
}
