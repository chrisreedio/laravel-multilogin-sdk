<?php

namespace ChrisReedIO\MultiloginSDK\Resource;

use ChrisReedIO\MultiloginSDK\Requests\BrowserProfileData\UnlockLockedProfiles;
use Saloon\Http\BaseResource;
use Saloon\Http\Response;

class BrowserProfileData extends BaseResource
{
	/**
	 * @param mixed $ids
	 * @param string $ids `Optional`. Specify the ID of the profile to unlock. To unlock all the profile, call the endpoint without the body.
	 * @param string $accept
	 */
	public function unlockLockedProfiles(?string $ids = null, ?string $accept = null): Response
	{
		return $this->connector->send(new UnlockLockedProfiles($ids, $ids, $accept));
	}
}
