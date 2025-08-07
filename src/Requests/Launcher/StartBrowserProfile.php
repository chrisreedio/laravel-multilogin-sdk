<?php

namespace ChrisReedIO\MultiloginSDK\Requests\Launcher;

use ChrisReedIO\MultiloginSDK\Enums\MultiloginDomain;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Start Browser Profile
 */
class StartBrowserProfile extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return MultiloginDomain::LAUNCHER->getUrl()."/api/v2/profile/f/{$this->folderId}/p/{$this->profileId}/start";
    }

    /**
     * @param  null|string  $automationType  `Optional`. Specify the automation type. Mimic can work with any of the types. Stealthfox can only work with **selenium**. Defaults to `selenium`.
     * @param  null|string  $headlessMode  `Optional`. Enable headless mode for all browsers. Defaults to `false`.
     * @param  null|string  $xStrictMode  Default to false. If set to true, you must specify values for all required parameters.
     */
    public function __construct(
        protected string $folderId,
        protected string $profileId,
        protected ?string $automationType = null,
        protected ?string $headlessMode = null,
        protected ?string $xStrictMode = null,
    ) {}

    public function defaultQuery(): array
    {
        return array_filter(['automation_type' => $this->automationType, 'headless_mode' => $this->headlessMode]);
    }

    public function defaultHeaders(): array
    {
        return array_filter(['X-Strict-Mode' => $this->xStrictMode]);
    }
}
