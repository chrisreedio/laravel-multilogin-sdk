<?php

namespace ChrisReedIO\MultiloginSDK\Resource;

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
use Saloon\Http\BaseResource;
use Saloon\Http\Response;

class ProfileAccessManagement extends BaseResource
{
	/**
	 * @param mixed $email
	 * @param mixed $password
	 * @param string $email `Required`. Enter your account email.
	 * @param string $password `Required`. Enter your account password.
	 * @param string $contentType
	 * @param string $accept
	 */
	public function userSignIn(
		?string $email = null,
		?string $password = null,
		?string $contentType = null,
		?string $accept = null,
	): Response
	{
		return $this->connector->send(new UserSignIn($email, $password, $email, $password, $contentType, $accept));
	}


	/**
	 * @param mixed $email
	 * @param mixed $refreshToken
	 * @param mixed $workspaceId
	 * @param string $email `Required`. Enter your account email.
	 * @param string $refreshToken `Required`. Enter your refresh token. Can be fetched with `POST user/signin`.
	 * @param string $workspaceId `Required`. Specify the workspace, in which you would like to work or switch to. Can be fetched with `GET /user/workspaces`. Defaults to `current sign-in workspace`.
	 * @param string $contentType
	 * @param string $accept
	 * @param string $xStrictMode Default to false. If set to true, you must specify values for all required parameters.
	 */
	public function userRefreshTokenSwitchWorkspace(
		?string $email = null,
		?string $refreshToken = null,
		?string $workspaceId = null,
		?string $contentType = null,
		?string $accept = null,
		?string $xStrictMode = null,
	): Response
	{
		return $this->connector->send(new UserRefreshTokenSwitchWorkspace($email, $refreshToken, $workspaceId, $email, $refreshToken, $workspaceId, $contentType, $accept, $xStrictMode));
	}


	/**
	 * @param string $token `Optional`. Specify the token to revoke. Defaults to `current token`.
	 * @param string $isAutomation `Optional`. Specify the token type to revoke. Defaults to `false`.
	 * @param string $contentType
	 * @param string $accept
	 * @param string $xStrictMode Default to false. If set to true, you must specify values for all required parameters.
	 */
	public function userRevokeToken(
		?string $token = null,
		?string $isAutomation = null,
		?string $contentType = null,
		?string $accept = null,
		?string $xStrictMode = null,
	): Response
	{
		return $this->connector->send(new UserRevokeToken($token, $isAutomation, $contentType, $accept, $xStrictMode));
	}


	/**
	 * @param mixed $newPassword
	 * @param mixed $password
	 * @param string $newPassword `Required`. Enter your new password.
	 * @param string $password `Required`. Enter your current password.
	 * @param string $contentType
	 * @param string $accept
	 */
	public function userChangePassword(
		?string $newPassword = null,
		?string $password = null,
		?string $contentType = null,
		?string $accept = null,
	): Response
	{
		return $this->connector->send(new UserChangePassword($newPassword, $password, $newPassword, $password, $contentType, $accept));
	}


	/**
	 * @param string $accept
	 */
	public function userWorkspaces(?string $accept = null): Response
	{
		return $this->connector->send(new UserWorkspaces($accept));
	}


	/**
	 * @param string $accept
	 */
	public function userTokenList(?string $accept = null): Response
	{
		return $this->connector->send(new UserTokenList($accept));
	}


	/**
	 * @param string $accept
	 */
	public function workspaceRestrictions(?string $accept = null): Response
	{
		return $this->connector->send(new WorkspaceRestrictions($accept));
	}


	/**
	 * @param string $accept
	 */
	public function workspaceFolders(?string $accept = null): Response
	{
		return $this->connector->send(new WorkspaceFolders($accept));
	}


	/**
	 * @param string $email `Required`. Specify the user's email.
	 * @param string $accept
	 */
	public function workspaceFoldersForUser(?string $email = null, ?string $accept = null): Response
	{
		return $this->connector->send(new WorkspaceFoldersForUser($email, $accept));
	}


	/**
	 * @param string $accept
	 */
	public function workspaceStatistics(?string $accept = null): Response
	{
		return $this->connector->send(new WorkspaceStatistics($accept));
	}


	/**
	 * @param string $expirationPeriod `Required`. Specify the token lifetime. Defaults to `24h`.
	 * @param string $accept
	 * @param string $xStrictMode Default to false. If set to true, you must specify values for all required parameters.
	 */
	public function workspaceAutomationToken(
		?string $expirationPeriod = null,
		?string $accept = null,
		?string $xStrictMode = null,
	): Response
	{
		return $this->connector->send(new WorkspaceAutomationToken($expirationPeriod, $accept, $xStrictMode));
	}


	/**
	 * @param mixed $name
	 * @param mixed $comment
	 * @param string $name `Required`. Name your folder. Defaults to `"New Folder"`.
	 * @param string $comment `Optional`. Add comments if necessary. Defaults to empty string `""`.
	 * @param string $contentType
	 * @param string $accept
	 * @param string $xStrictMode Default to false. If set to true, you must specify values for all required parameters.
	 */
	public function workspaceCreateFolder(
		?string $name = null,
		?string $comment = null,
		?string $contentType = null,
		?string $accept = null,
		?string $xStrictMode = null,
	): Response
	{
		return $this->connector->send(new WorkspaceCreateFolder($name, $comment, $name, $comment, $contentType, $accept, $xStrictMode));
	}


	/**
	 * @param mixed $folderId
	 * @param mixed $name
	 * @param mixed $comment
	 * @param string $folderId `Required`. Specify the folder ID.
	 * @param string $name `Required`. Specify the new folder name.
	 * @param string $comment `Optional`. Add comments if necessary. Defaults to empty string `""`.
	 * @param string $contentType
	 * @param string $accept
	 * @param string $xStrictMode Default to false. If set to true, you must specify values for all required parameters.
	 */
	public function workspaceUpdateFolder(
		?string $folderId = null,
		?string $name = null,
		?string $comment = null,
		?string $contentType = null,
		?string $accept = null,
		?string $xStrictMode = null,
	): Response
	{
		return $this->connector->send(new WorkspaceUpdateFolder($folderId, $name, $comment, $folderId, $name, $comment, $contentType, $accept, $xStrictMode));
	}


	/**
	 * @param mixed $ids
	 * @param string $ids `Required`. Specify the folder ID to remove,
	 * @param string $contentType
	 * @param string $accept
	 */
	public function workspaceRemoveFolders(
		?string $ids = null,
		?string $contentType = null,
		?string $accept = null,
	): Response
	{
		return $this->connector->send(new WorkspaceRemoveFolders($ids, $ids, $contentType, $accept));
	}


	/**
	 * @param mixed $workspaceId
	 * @param string $workspaceId `Required`. Specify the workspace, which you would like to leave.
	 * @param string $contentType
	 * @param string $accept
	 */
	public function workspaceLeave(
		?string $workspaceId = null,
		?string $contentType = null,
		?string $accept = null,
	): Response
	{
		return $this->connector->send(new WorkspaceLeave($workspaceId, $workspaceId, $contentType, $accept));
	}
}
