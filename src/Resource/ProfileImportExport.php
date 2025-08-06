<?php

namespace ChrisReedIO\MultiloginSDK\Resource;

use ChrisReedIO\MultiloginSDK\Requests\ProfileImportExport\ExportStatusAll;
use ChrisReedIO\MultiloginSDK\Requests\ProfileImportExport\ExportStatusByProfile;
use ChrisReedIO\MultiloginSDK\Requests\ProfileImportExport\ImportStatusAll;
use ChrisReedIO\MultiloginSDK\Requests\ProfileImportExport\ImportStatusByProfile;
use ChrisReedIO\MultiloginSDK\Requests\ProfileImportExport\ProfileExport;
use ChrisReedIO\MultiloginSDK\Requests\ProfileImportExport\ProfileImport;
use Saloon\Http\BaseResource;
use Saloon\Http\Response;

class ProfileImportExport extends BaseResource
{
	/**
	 * @param string $profileId
	 */
	public function profileExport(string $profileId): Response
	{
		return $this->connector->send(new ProfileExport($profileId));
	}


	/**
	 * @param string $exportId
	 */
	public function exportStatusByProfile(string $exportId): Response
	{
		return $this->connector->send(new ExportStatusByProfile($exportId));
	}


	public function exportStatusAll(): Response
	{
		return $this->connector->send(new ExportStatusAll());
	}


	/**
	 * @param string $importPath `Required`. Specify the path to the profile in the zip format.
	 * @param string $isLocal `Required`. Specify the type of the imported profile.
	 */
	public function profileImport(?string $importPath = null, ?string $isLocal = null): Response
	{
		return $this->connector->send(new ProfileImport($importPath, $isLocal));
	}


	/**
	 * @param string $importId
	 */
	public function importStatusByProfile(string $importId): Response
	{
		return $this->connector->send(new ImportStatusByProfile($importId));
	}


	public function importStatusAll(): Response
	{
		return $this->connector->send(new ImportStatusAll());
	}
}
