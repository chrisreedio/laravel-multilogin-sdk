<?php

namespace ChrisReedIO\MultiloginSDK;

use ChrisReedIO\MultiloginSDK\Resource\BookmarkManagement;
use ChrisReedIO\MultiloginSDK\Resource\BrowserProfileData;
use ChrisReedIO\MultiloginSDK\Resource\Launcher;
use ChrisReedIO\MultiloginSDK\Resource\ObjectStorage;
use ChrisReedIO\MultiloginSDK\Resource\PreMadeCookies;
use ChrisReedIO\MultiloginSDK\Resource\ProfileAccessManagement;
use ChrisReedIO\MultiloginSDK\Resource\ProfileImportExport;
use ChrisReedIO\MultiloginSDK\Resource\ProfileManagement;
use ChrisReedIO\MultiloginSDK\Resource\Proxy;
use ChrisReedIO\MultiloginSDK\Resource\ScriptRunner;
use ChrisReedIO\MultiloginSDK\Resource\TwoFactor;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Cache;
use Saloon\Http\Auth\TokenAuthenticator;
use Saloon\Http\Connector;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\PaginationPlugin\Contracts\HasPagination;
use Saloon\PaginationPlugin\OffsetPaginator;

/**
 * Multilogin X API
 */
class MultiloginSDK extends Connector implements HasPagination
{
    protected string $token;

    public function __construct(protected ?string $email = null)
    {
        $this->email ??= Cache::get('multilogin_email') ?? config('multilogin.email');
    }

    protected function defaultAuth(): ?TokenAuthenticator
    {
        // dump('defaultAuth');
        // If no email is provided, return null
        if ($this->email === null) {
            dump('No email provided');

            return null;
        }

        // Check the cache for a multilogin_access_token
        $accessToken = Cache::get('multilogin_access_token');
        $refreshToken = Cache::get('multilogin_refresh_token');
        /** @var Carbon $expiresAt */
        $expiresAt = Cache::get('multilogin_access_token_expires_at');

        // dump('$accessToken: '.$accessToken);
        // dump('$refreshToken: '.$refreshToken);
        // dump('$expiresAt: '.$expiresAt);

        // If no access token or refresh token is found, return null
        if ($accessToken === null && $refreshToken === null) {
            dump('No access token or refresh token found');

            return null;
        }

        // Refresh the access token if it's expired and a refresh token is present
        if ($accessToken !== null && $refreshToken !== null && $expiresAt !== null && $expiresAt->isPast()) {
            // dump('Refreshing access token');
            // Call the refresh token endpoint
            // new Connector
            $connector = new self($this->email);
            $connector->authenticate(new TokenAuthenticator($accessToken));
            $response = $connector->profileAccessManagement()->userRefreshTokenSwitchWorkspace($this->email, $refreshToken);

            // If the response is not successful, return null
            if ($response->failed()) {
                dump('Failed to refresh access token');
                dd($response->json());

                return null;
            }

            // Get the data from the response
            $data = $response->json('data');
            $accessToken = $data['token'];
            $refreshToken = $data['refresh_token'];
            // dd($data);

            // Cache the access token for 15 minutes
            Cache::put('multilogin_access_token', $accessToken);
            Cache::put('multilogin_access_token_expires_at', now()->addMinutes(15));
            // Cache the refresh token indefinitely
            Cache::put('multilogin_refresh_token', $refreshToken);
        }

        // Return the authenticator
        return new TokenAuthenticator($accessToken);
    }

    public function resolveBaseUrl(): string
    {
        return 'https://api.multilogin.com';
    }

    public function bookmarkManagement(): BookmarkManagement
    {
        return new BookmarkManagement($this);
    }

    public function browserProfileData(): BrowserProfileData
    {
        return new BrowserProfileData($this);
    }

    public function launcher(): Launcher
    {
        return new Launcher($this);
    }

    public function objectStorage(): ObjectStorage
    {
        return new ObjectStorage($this);
    }

    public function preMadeCookies(): PreMadeCookies
    {
        return new PreMadeCookies($this);
    }

    public function profileAccessManagement(): ProfileAccessManagement
    {
        return new ProfileAccessManagement($this);
    }

    public function profileImportExport(): ProfileImportExport
    {
        return new ProfileImportExport($this);
    }

    public function profileManagement(): ProfileManagement
    {
        return new ProfileManagement($this);
    }

    public function proxy(): Proxy
    {
        return new Proxy($this);
    }

    public function scriptRunner(): ScriptRunner
    {
        return new ScriptRunner($this);
    }

    public function twoFactor(): TwoFactor
    {
        return new TwoFactor($this);
    }

    public function paginate(Request $request): OffsetPaginator
    {
        return new class(connector: $this, request: $request) extends OffsetPaginator
        {
            protected ?int $perPageLimit = 100;

            protected function isLastPage(Response $response): bool
            {
                return $this->getOffset() >= (int) $response->json('data.total_count');
            }

            protected function getPageItems(Response $response, Request $request): array
            {
                return $response->json('data');
            }
        };
    }
}
