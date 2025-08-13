<?php

namespace ChrisReedIO\MultiloginSDK\Resource;

use ChrisReedIO\MultiloginSDK\Enums\ExpirationPeriod;
use ChrisReedIO\MultiloginSDK\Requests\ProfileAccessManagement\UserChangePassword;
use ChrisReedIO\MultiloginSDK\Requests\ProfileAccessManagement\UserRefreshTokenSwitchWorkspace;
use ChrisReedIO\MultiloginSDK\Requests\ProfileAccessManagement\UserRevokeToken;
use ChrisReedIO\MultiloginSDK\Requests\ProfileAccessManagement\UserSignIn;
use ChrisReedIO\MultiloginSDK\Requests\ProfileAccessManagement\UserTokenList;
use ChrisReedIO\MultiloginSDK\Requests\ProfileAccessManagement\UserWorkspaces;
use ChrisReedIO\MultiloginSDK\Requests\ProfileAccessManagement\WorkspaceAutomationToken;
use ChrisReedIO\MultiloginSDK\Requests\ProfileAccessManagement\WorkspaceCreateFolder;
use ChrisReedIO\MultiloginSDK\Requests\ProfileAccessManagement\WorkspaceFolders;
use ChrisReedIO\MultiloginSDK\Requests\ProfileAccessManagement\WorkspaceFoldersForUser;
use ChrisReedIO\MultiloginSDK\Requests\ProfileAccessManagement\WorkspaceLeave;
use ChrisReedIO\MultiloginSDK\Requests\ProfileAccessManagement\WorkspaceRemoveFolders;
use ChrisReedIO\MultiloginSDK\Requests\ProfileAccessManagement\WorkspaceRestrictions;
use ChrisReedIO\MultiloginSDK\Requests\ProfileAccessManagement\WorkspaceStatistics;
use ChrisReedIO\MultiloginSDK\Requests\ProfileAccessManagement\WorkspaceUpdateFolder;
use Illuminate\Support\Facades\Cache;
use Saloon\Http\BaseResource;
use Saloon\Http\Response;

class ProfileAccessManagement extends BaseResource
{
    /**
     * @param  string  $email  `Required`. Enter your account email.
     * @param  string  $password  `Required`. Enter your account password. This should already be md5 hashed.
     */
    public function userSignIn(
        ?string $email = null,
        ?string $password = null,
    ): Response {
        $response = $this->connector->send(new UserSignIn($email, $password));

        if ($response->failed()) {
            return $response;
        }

        $data = $response->json('data');
        $accessToken = $data['token'];
        $refreshToken = $data['refresh_token'];

        // Cache the tokens in redis
        // Access token expires in 15 minutes, refresh has no expiration
        Cache::put('multilogin_email', $email);
        Cache::put('multilogin_access_token', $accessToken);
        Cache::put('multilogin_access_token_expires_at', now()->addMinutes(15));
        Cache::put('multilogin_refresh_token', $refreshToken);

        return $response;
    }

    /**
     * @param  string  $email  `Required`. Enter your account email.
     * @param  string  $refreshToken  `Required`. Enter your refresh token. Can be fetched with `POST user/signin`.
     * @param  string  $workspaceId  `Required`. Specify the workspace, in which you would like to work or switch to. Can be fetched with `GET /user/workspaces`. Defaults to `current sign-in workspace`.
     * @param  bool  $xStrictMode  Default to false. If set to true, you must specify values for all required parameters.
     */
    public function userRefreshTokenSwitchWorkspace(
        string $email,
        string $refreshToken,
        string $workspaceId,
        bool $xStrictMode = false,
    ): Response {
        $response = $this->connector->send(new UserRefreshTokenSwitchWorkspace($email, $refreshToken, $workspaceId, $xStrictMode));

        if ($response->failed()) {
            return $response;
        }

        $data = $response->json('data');
        $accessToken = $data['token'];
        $refreshToken = $data['refresh_token'];

        Cache::put('multilogin_access_token', $accessToken);
        Cache::put('multilogin_access_token_expires_at', now()->addMinutes(15));
        Cache::put('multilogin_refresh_token', $refreshToken);

        return $response;
    }

    /**
     * @param  ?string  $token  `Optional`. Specify the token to revoke. Defaults to `current token`.
     * @param  bool  $isAutomation  `Optional`. Specify the token type to revoke. Defaults to `false`.
     * @param  bool  $xStrictMode  Default to false. If set to true, you must specify values for all required parameters.
     */
    public function userRevokeToken(
        ?string $token = null,
        bool $isAutomation = false,
        bool $xStrictMode = false,
    ): Response {
        return $this->connector->send(new UserRevokeToken($token, $isAutomation, $xStrictMode));
    }

    /**
     * @param  string  $newPassword  `Required`. Enter your new password.
     * @param  string  $password  `Required`. Enter your current password.
     */
    public function userChangePassword(
        ?string $newPassword = null,
        ?string $password = null,
    ): Response {
        return $this->connector->send(new UserChangePassword($newPassword, $password));
    }

    public function userWorkspaces(?string $accept = null): Response
    {
        return $this->connector->send(new UserWorkspaces($accept));
    }

    public function userTokenList(?string $accept = null): Response
    {
        return $this->connector->send(new UserTokenList($accept));
    }

    public function workspaceRestrictions(?string $accept = null): Response
    {
        return $this->connector->send(new WorkspaceRestrictions($accept));
    }

    public function workspaceFolders(?string $accept = null): Response
    {
        return $this->connector->send(new WorkspaceFolders($accept));
    }

    /**
     * @param  string  $email  `Required`. Specify the user's email.
     */
    public function workspaceFoldersForUser(?string $email = null, ?string $accept = null): Response
    {
        return $this->connector->send(new WorkspaceFoldersForUser($email, $accept));
    }

    public function workspaceStatistics(?string $accept = null): Response
    {
        return $this->connector->send(new WorkspaceStatistics($accept));
    }

    /**
     * @param  ?ExpirationPeriod  $expirationPeriod  `Required`. Specify the token lifetime. Defaults to `24h`.
     * @param  string  $xStrictMode  Default to false. If set to true, you must specify values for all required parameters.
     */
    public function workspaceAutomationToken(
        ?ExpirationPeriod $expirationPeriod = null,
        ?string $xStrictMode = null,
    ): Response {
        return $this->connector->send(new WorkspaceAutomationToken($expirationPeriod, $xStrictMode));
    }

    /**
     * @param  mixed  $name
     * @param  mixed  $comment
     * @param  string  $name  `Required`. Name your folder. Defaults to `"New Folder"`.
     * @param  string  $comment  `Optional`. Add comments if necessary. Defaults to empty string `""`.
     * @param  string  $xStrictMode  Default to false. If set to true, you must specify values for all required parameters.
     */
    public function workspaceCreateFolder(
        ?string $name = null,
        ?string $comment = null,
        ?string $contentType = null,
        ?string $accept = null,
        ?string $xStrictMode = null,
    ): Response {
        return $this->connector->send(new WorkspaceCreateFolder($name, $comment, $name, $comment, $contentType, $accept, $xStrictMode));
    }

    /**
     * @param  mixed  $folderId
     * @param  mixed  $name
     * @param  mixed  $comment
     * @param  string  $folderId  `Required`. Specify the folder ID.
     * @param  string  $name  `Required`. Specify the new folder name.
     * @param  string  $comment  `Optional`. Add comments if necessary. Defaults to empty string `""`.
     * @param  string  $xStrictMode  Default to false. If set to true, you must specify values for all required parameters.
     */
    public function workspaceUpdateFolder(
        ?string $folderId = null,
        ?string $name = null,
        ?string $comment = null,
        ?string $contentType = null,
        ?string $accept = null,
        ?string $xStrictMode = null,
    ): Response {
        return $this->connector->send(new WorkspaceUpdateFolder($folderId, $name, $comment, $folderId, $name, $comment, $contentType, $accept, $xStrictMode));
    }

    /**
     * @param  mixed  $ids
     * @param  string  $ids  `Required`. Specify the folder ID to remove,
     */
    public function workspaceRemoveFolders(
        ?string $ids = null,
        ?string $contentType = null,
        ?string $accept = null,
    ): Response {
        return $this->connector->send(new WorkspaceRemoveFolders($ids, $ids, $contentType, $accept));
    }

    /**
     * @param  mixed  $workspaceId
     * @param  string  $workspaceId  `Required`. Specify the workspace, which you would like to leave.
     */
    public function workspaceLeave(
        ?string $workspaceId = null,
        ?string $contentType = null,
        ?string $accept = null,
    ): Response {
        return $this->connector->send(new WorkspaceLeave($workspaceId, $workspaceId, $contentType, $accept));
    }
}
