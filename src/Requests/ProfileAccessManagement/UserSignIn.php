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
     * @param  null|mixed  $email
     * @param  null|mixed  $password
     * @param  null|string  $email  `Required`. Enter your account email.
     * @param  null|string  $password  `Required`. Enter your account password.
     */
    public function __construct(
        protected ?string $email = null,
        protected ?string $password = null,
    ) {}

    public function defaultBody(): array
    {
        return array_filter(['email' => $this->email, 'password' => $this->password]);
    }

    public function defaultQuery(): array
    {
        return array_filter(['email' => $this->email, 'password' => $this->password]);
    }

    public function defaultHeaders(): array
    {
        return array_filter([]);
    }

    public function defaultAuth(): ?NullAuthenticator
    {
        return new NullAuthenticator;
    }
}
