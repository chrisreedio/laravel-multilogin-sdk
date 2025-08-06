<?php

namespace ChrisReedIO\MultiloginSDK\Requests\Launcher;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Validate Proxy
 */
class ValidateProxy extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return '/api/v1/proxy/validate';
    }

    /**
     * @param  null|string  $type  `Required`. Specify the proxy type. Defaults to `http`.
     * @param  null|string  $host  `Required`. Specify the proxy host.
     * @param  null|string  $port  `Required`. Specify the proxy port.
     * @param  null|string  $username  `Required`. Specify the proxy username.
     * @param  null|string  $password  `Required`. Specify the proxy password.
     * @param  null|string  $xStrictMode  Default to false. If set to true, you must specify values for all required parameters.
     */
    public function __construct(
        protected ?string $type = null,
        protected ?string $host = null,
        protected ?string $port = null,
        protected ?string $username = null,
        protected ?string $password = null,
        protected ?string $accept = null,
        protected ?string $xStrictMode = null,
    ) {}

    public function defaultQuery(): array
    {
        return array_filter([
            'type' => $this->type,
            'host' => $this->host,
            'port' => $this->port,
            'username' => $this->username,
            'password' => $this->password,
        ]);
    }

    public function defaultHeaders(): array
    {
        return array_filter(['accept' => $this->accept, 'X-Strict-Mode' => $this->xStrictMode]);
    }
}
