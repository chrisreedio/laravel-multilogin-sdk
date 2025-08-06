<?php

namespace ChrisReedIO\MultiloginSDK\Requests\ProfileAccessManagement;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * User Refresh Token (Switch Workspace)
 */
class UserRefreshTokenSwitchWorkspace extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return '/user/refresh_token';
    }

    /**
     * @param  null|mixed  $email
     * @param  null|mixed  $refreshToken
     * @param  null|mixed  $workspaceId
     * @param  null|string  $email  `Required`. Enter your account email.
     * @param  null|string  $refreshToken  `Required`. Enter your refresh token. Can be fetched with `POST user/signin`.
     * @param  null|string  $workspaceId  `Required`. Specify the workspace, in which you would like to work or switch to. Can be fetched with `GET /user/workspaces`. Defaults to `current sign-in workspace`.
     * @param  null|string  $xStrictMode  Default to false. If set to true, you must specify values for all required parameters.
     */
    public function __construct(
        protected ?string $email = null,
        protected ?string $refreshToken = null,
        protected ?string $workspaceId = null,
        protected ?string $xStrictMode = null,
    ) {}

    public function defaultBody(): array
    {
        return array_filter(['email' => $this->email, 'refresh_token' => $this->refreshToken, 'workspace_id' => $this->workspaceId]);
    }

    public function defaultQuery(): array
    {
        return array_filter(['email' => $this->email, 'refresh_token' => $this->refreshToken, 'workspace_id' => $this->workspaceId]);
    }

    public function defaultHeaders(): array
    {
        return array_filter(['X-Strict-Mode' => $this->xStrictMode]);
    }
}
