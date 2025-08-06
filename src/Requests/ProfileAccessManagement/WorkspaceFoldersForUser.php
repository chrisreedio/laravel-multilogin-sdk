<?php

namespace ChrisReedIO\MultiloginSDK\Requests\ProfileAccessManagement;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Workspace Folders For User
 */
class WorkspaceFoldersForUser extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/workspace/folders_for_user';
    }

    /**
     * @param  null|string  $email  `Required`. Specify the user's email.
     */
    public function __construct(
        protected ?string $email = null,
    ) {}

    public function defaultQuery(): array
    {
        return array_filter(['email' => $this->email]);
    }

    public function defaultHeaders(): array
    {
        return array_filter([]);
    }
}
