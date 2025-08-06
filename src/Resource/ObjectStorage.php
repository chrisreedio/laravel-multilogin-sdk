<?php

namespace ChrisReedIO\MultiloginSDK\Resource;

use ChrisReedIO\MultiloginSDK\Requests\ObjectStorage\CloudToLocal;
use ChrisReedIO\MultiloginSDK\Requests\ObjectStorage\CreateAndUpload;
use ChrisReedIO\MultiloginSDK\Requests\ObjectStorage\CreateExtension;
use ChrisReedIO\MultiloginSDK\Requests\ObjectStorage\DeleteObject;
use ChrisReedIO\MultiloginSDK\Requests\ObjectStorage\DisableExtension;
use ChrisReedIO\MultiloginSDK\Requests\ObjectStorage\DownloadObject;
use ChrisReedIO\MultiloginSDK\Requests\ObjectStorage\EnableExtension;
use ChrisReedIO\MultiloginSDK\Requests\ObjectStorage\GetListOfObjectTypes;
use ChrisReedIO\MultiloginSDK\Requests\ObjectStorage\GetObjectMetaById;
use ChrisReedIO\MultiloginSDK\Requests\ObjectStorage\GetObjectsMeta;
use ChrisReedIO\MultiloginSDK\Requests\ObjectStorage\GetStatisticsForObjects;
use ChrisReedIO\MultiloginSDK\Requests\ObjectStorage\ListOfObjectsPerProfile;
use ChrisReedIO\MultiloginSDK\Requests\ObjectStorage\LocalToCloud;
use ChrisReedIO\MultiloginSDK\Requests\ObjectStorage\ObjectProfileUsages;
use ChrisReedIO\MultiloginSDK\Requests\ObjectStorage\RestoreObject;
use ChrisReedIO\MultiloginSDK\Requests\ObjectStorage\UploadObject;
use Saloon\Http\BaseResource;
use Saloon\Http\Response;

class ObjectStorage extends BaseResource
{
	/**
	 * @param mixed $objectTypeId
	 * @param mixed $objectPath
	 * @param mixed $storageType
	 * @param mixed $objectMeta
	 * @param mixed $encrypt
	 * @param string $objectTypeId `Required`. The ID of the object type
	 * @param string $objectPath `Required`. The path of the object.
	 * @param string $storageType `Required`. The type of storage.
	 * @param string $objectMeta `Optional`. The object meta data.
	 * @param string $encrypt `Optional`. Encryption value
	 */
	public function uploadObject(
		?string $objectTypeId = null,
		?string $objectPath = null,
		?string $storageType = null,
		?string $objectMeta = null,
		?string $encrypt = null,
	): Response
	{
		return $this->connector->send(new UploadObject($objectTypeId, $objectPath, $storageType, $objectMeta, $encrypt, $objectTypeId, $objectPath, $storageType, $objectMeta, $encrypt));
	}


	/**
	 * @param mixed $objectName
	 * @param mixed $objectExtension
	 * @param mixed $objectTypeId
	 * @param mixed $objectBody
	 * @param mixed $objectMeta
	 * @param string $objectName `Required`
	 * @param string $objectMeta `Required`
	 * @param string $objectExtension `Required`
	 * @param string $objectTypeId `Required`
	 * @param string $objectBody `Required`
	 * @param string $encrypt `Optional`
	 */
	public function createAndUpload(
		?string $objectName = null,
		?string $objectExtension = null,
		?string $objectTypeId = null,
		?string $objectBody = null,
		?string $objectMeta = null,
		?string $encrypt = null,
	): Response
	{
		return $this->connector->send(new CreateAndUpload($objectName, $objectExtension, $objectTypeId, $objectBody, $objectMeta, $objectName, $objectMeta, $objectExtension, $objectTypeId, $objectBody, $encrypt));
	}


	/**
	 * @param string $objectId `Required`
	 */
	public function objectProfileUsages(?string $objectId = null): Response
	{
		return $this->connector->send(new ObjectProfileUsages($objectId));
	}


	public function getListOfObjectTypes(): Response
	{
		return $this->connector->send(new GetListOfObjectTypes());
	}


	public function getStatisticsForObjects(): Response
	{
		return $this->connector->send(new GetStatisticsForObjects());
	}


	/**
	 * @param string $limit `Required`. Specify the number of objectsyou want to display. Default is `10`.
	 * @param string $offset `Required`. Specify the number of objects to skip from the beginning of the returned data before displaying the results. 0 means starting from the beginning. Defaults to `0`.
	 * @param string $objectName `Optional`. Specify the name of the objects you want to dispaly.
	 * @param string $objectTypeId `Optional`. Specify the object type you want to display.
	 * @param string $storageType `Optional`. Specify the storage type you want to display.
	 * @param string $creator `Optional`. Specify the UUID of the creator of the objects you want to dispaly.
	 * @param string $trashbin `Optional`. Specify if you want to see either the objects inside the trashbin or the ones that are available. Default is `false`.
	 * @param string $createStartDate `Optional`. Specify the create date of the objects.
	 * @param string $createEndDate `Optional`. Specify the end date of the objects.
	 * @param string $updateStartDate `Optional`. Specify the update date of the objects.
	 * @param string $updateEndDate `Optional`. Specify the end update date of the objects.
	 */
	public function getObjectsMeta(
		?string $limit = null,
		?string $offset = null,
		?string $objectName = null,
		?string $objectTypeId = null,
		?string $storageType = null,
		?string $creator = null,
		?string $trashbin = null,
		?string $createStartDate = null,
		?string $createEndDate = null,
		?string $updateStartDate = null,
		?string $updateEndDate = null,
	): Response
	{
		return $this->connector->send(new GetObjectsMeta($limit, $offset, $objectName, $objectTypeId, $storageType, $creator, $trashbin, $createStartDate, $createEndDate, $updateStartDate, $updateEndDate));
	}


	/**
	 * @param string $id
	 */
	public function getObjectMetaById(string $id): Response
	{
		return $this->connector->send(new GetObjectMetaById($id));
	}


	/**
	 * @param string $id
	 * @param string $permanently `Optional`. Specify the boolean value to either delete the object to trashbin or permanently. Default to `false`.
	 */
	public function deleteObject(string $id, ?string $permanently = null): Response
	{
		return $this->connector->send(new DeleteObject($id, $permanently));
	}


	/**
	 * @param string $id
	 */
	public function restoreObject(string $id): Response
	{
		return $this->connector->send(new RestoreObject($id));
	}


	/**
	 * @param mixed $objectId
	 * @param string $objectId `Required`. Specify the id of the object.
	 */
	public function cloudToLocal(?string $objectId = null): Response
	{
		return $this->connector->send(new CloudToLocal($objectId, $objectId));
	}


	/**
	 * @param mixed $objectPath
	 * @param mixed $objectId
	 * @param string $objectPath `Required`. Specify the path to the object.
	 * @param string $objectId `Required`. Specify the id of the object.
	 */
	public function localToCloud(?string $objectPath = null, ?string $objectId = null): Response
	{
		return $this->connector->send(new LocalToCloud($objectPath, $objectId, $objectPath, $objectId));
	}


	/**
	 * @param string $idUpload `Required`. Specify the id of the object.
	 */
	public function downloadObject(?string $idUpload = null): Response
	{
		return $this->connector->send(new DownloadObject($idUpload));
	}


	/**
	 * @param mixed $url
	 * @param mixed $browserType
	 * @param mixed $storageType
	 * @param string $url `Required`. The url to the extension.
	 * @param string $browserType `Required`. Specify the browser type. Note that the browser type should be the same as the extension you want to use.
	 * @param string $storageType `Required`, specify the storage type.
	 */
	public function createExtension(
		?string $url = null,
		?string $browserType = null,
		?string $storageType = null,
	): Response
	{
		return $this->connector->send(new CreateExtension($url, $browserType, $storageType, $url, $browserType, $storageType));
	}


	/**
	 * @param mixed $profileIds
	 * @param string $objectId `Required`. Specify the object id of the extension.
	 * @param string $profileIds `Required`. Specify the profiles you want to apply the extension on.
	 */
	public function enableExtension(?string $profileIds = null, ?string $objectId = null): Response
	{
		return $this->connector->send(new EnableExtension($profileIds, $objectId, $profileIds));
	}


	/**
	 * @param mixed $profileIds
	 * @param string $profileIds `Required`. Specify the profiles you want to disable the extension on.
	 * @param string $objectId `Required`. Specify the id of the extension you want to disable.
	 */
	public function disableExtension(?string $profileIds = null, ?string $objectId = null): Response
	{
		return $this->connector->send(new DisableExtension($profileIds, $profileIds, $objectId));
	}


	/**
	 * @param string $objectType `Required`. Specify the object type.
	 * @param string $profileId `Required`. Specify the profile id you want to check.
	 */
	public function listOfObjectsPerProfile(?string $objectType = null, ?string $profileId = null): Response
	{
		return $this->connector->send(new ListOfObjectsPerProfile($objectType, $profileId));
	}
}
