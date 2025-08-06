<?php

namespace ChrisReedIO\MultiloginSDK\Requests\ObjectStorage;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Get Objects meta
 */
class GetObjectsMeta extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/api/v1/resources/metas";
	}


	/**
	 * @param null|string $limit `Required`. Specify the number of objectsyou want to display. Default is `10`.
	 * @param null|string $offset `Required`. Specify the number of objects to skip from the beginning of the returned data before displaying the results. 0 means starting from the beginning. Defaults to `0`.
	 * @param null|string $objectName `Optional`. Specify the name of the objects you want to dispaly.
	 * @param null|string $objectTypeId `Optional`. Specify the object type you want to display.
	 * @param null|string $storageType `Optional`. Specify the storage type you want to display.
	 * @param null|string $creator `Optional`. Specify the UUID of the creator of the objects you want to dispaly.
	 * @param null|string $trashbin `Optional`. Specify if you want to see either the objects inside the trashbin or the ones that are available. Default is `false`.
	 * @param null|string $createStartDate `Optional`. Specify the create date of the objects.
	 * @param null|string $createEndDate `Optional`. Specify the end date of the objects.
	 * @param null|string $updateStartDate `Optional`. Specify the update date of the objects.
	 * @param null|string $updateEndDate `Optional`. Specify the end update date of the objects.
	 */
	public function __construct(
		protected ?string $limit = null,
		protected ?string $offset = null,
		protected ?string $objectName = null,
		protected ?string $objectTypeId = null,
		protected ?string $storageType = null,
		protected ?string $creator = null,
		protected ?string $trashbin = null,
		protected ?string $createStartDate = null,
		protected ?string $createEndDate = null,
		protected ?string $updateStartDate = null,
		protected ?string $updateEndDate = null,
	) {
	}


	public function defaultQuery(): array
	{
		return array_filter([
			'limit' => $this->limit,
			'offset' => $this->offset,
			'object_name' => $this->objectName,
			'object_type_id' => $this->objectTypeId,
			'storage_type' => $this->storageType,
			'creator' => $this->creator,
			'trashbin' => $this->trashbin,
			'create_start_date' => $this->createStartDate,
			'create_end_date' => $this->createEndDate,
			'update_start_date' => $this->updateStartDate,
			'update_end_date' => $this->updateEndDate,
		]);
	}
}
