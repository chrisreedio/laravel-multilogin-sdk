<?php

namespace ChrisReedIO\MultiloginSDK\Resource;

use ChrisReedIO\MultiloginSDK\Requests\PreMadeCookies\CookiesList;
use ChrisReedIO\MultiloginSDK\Requests\PreMadeCookies\CreateCookiesMetadata;
use ChrisReedIO\MultiloginSDK\Requests\PreMadeCookies\TargetWebsiteList;
use ChrisReedIO\MultiloginSDK\Requests\PreMadeCookies\UpdateCookiesMetadata;
use Saloon\Http\BaseResource;
use Saloon\Http\Response;

class PreMadeCookies extends BaseResource
{
	public function targetWebsiteList(): Response
	{
		return $this->connector->send(new TargetWebsiteList());
	}


	/**
	 * @param mixed $profileId
	 * @param mixed $targetWebsite
	 * @param string $profileId `Required`
	 * @param string $targetWebsite `Required`. Defaults to `mix`.
	 * @param string $xStrictMode Default to false. If set to true, you must specify values for all required parameters.
	 */
	public function createCookiesMetadata(
		?string $profileId = null,
		?string $targetWebsite = null,
		?string $xStrictMode = null,
	): Response
	{
		return $this->connector->send(new CreateCookiesMetadata($profileId, $targetWebsite, $profileId, $targetWebsite, $xStrictMode));
	}


	public function cookiesList(): Response
	{
		return $this->connector->send(new CookiesList());
	}


	/**
	 * @param mixed $profileId
	 * @param mixed $targetWebsite
	 * @param mixed $additionalWebsite
	 * @param string $profileId `Required`
	 * @param string $targetWebsite `Required`. Defaults to `mix`.
	 * @param string $additionalWebsite `Optional`
	 * @param string $xStrictMode Default to false. If set to true, you must specify values for all required parameters.
	 */
	public function updateCookiesMetadata(
		?string $profileId = null,
		?string $targetWebsite = null,
		?string $additionalWebsite = null,
		?string $xStrictMode = null,
	): Response
	{
		return $this->connector->send(new UpdateCookiesMetadata($profileId, $targetWebsite, $additionalWebsite, $profileId, $targetWebsite, $additionalWebsite, $xStrictMode));
	}
}
