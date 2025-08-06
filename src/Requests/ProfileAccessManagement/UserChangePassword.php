<?php

namespace ChrisReedIO\MultiloginSDK\Requests\ProfileAccessManagement;

use DateTime;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * User Change Password
 */
class UserChangePassword extends Request implements HasBody
{
	use HasJsonBody;

	protected Method $method = Method::POST;


	public function resolveEndpoint(): string
	{
		return "/user/change_password";
	}


	/**
	 * @param null|mixed $newPassword
	 * @param null|mixed $password
	 * @param null|string $newPassword `Required`. Enter your new password.
	 * @param null|string $password `Required`. Enter your current password.
	 */
	public function __construct(
		protected ?string $newPassword = null,
		protected ?string $password = null,
	) {
	}


	public function defaultBody(): array
	{
		return array_filter(['new_password' => $this->newPassword, 'password' => $this->password]);
	}


	public function defaultQuery(): array
	{
		return array_filter(['new_password' => $this->newPassword, 'password' => $this->password]);
	}


	public function defaultHeaders(): array
	{
		return array_filter([]);
	}
}
