<?php

namespace ChrisReedIO\MultiloginSDK\Requests\ProfileAccessManagement;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Auth\NullAuthenticator;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * User Sign In
 */
class UserSignIn extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return '/user/signin';
    }

    /**
     * @param  string  $email  `Required`. Enter your account email.
     * @param  string  $password  `Required`. Enter your account password. This
     */
    public function __construct(
        protected string $email,
        protected string $password,
    ) {}

    public function defaultBody(): array
    {
        return array_filter(['email' => $this->email, 'password' => $this->password]);
    }

    public function defaultAuth(): ?NullAuthenticator
    {
        return new NullAuthenticator;
    }
}
