<?php

namespace ChrisReedIO\MultiloginSDK\Requests\ObjectStorage;

use DateTime;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Create and Upload
 */
class CreateAndUpload extends Request implements HasBody
{
	use HasJsonBody;

	protected Method $method = Method::POST;


	public function resolveEndpoint(): string
	{
		return "/api/v1/object_storage/create_and_upload";
	}


	/**
	 * @param null|mixed $objectName
	 * @param null|mixed $objectExtension
	 * @param null|mixed $objectTypeId
	 * @param null|mixed $objectBody
	 * @param null|mixed $objectMeta
	 * @param null|string $objectName `Required`
	 * @param null|string $objectMeta `Required`
	 * @param null|string $objectExtension `Required`
	 * @param null|string $objectTypeId `Required`
	 * @param null|string $objectBody `Required`
	 * @param null|string $encrypt `Optional`
	 */
	public function __construct(
		protected ?string $objectName = null,
		protected ?string $objectExtension = null,
		protected ?string $objectTypeId = null,
		protected ?string $objectBody = null,
		protected ?string $objectMeta = null,
		protected ?string $encrypt = null,
	) {
	}


	public function defaultBody(): array
	{
		return array_filter([
			'object_name' => $this->objectName,
			'object_extension' => $this->objectExtension,
			'object_type_id' => $this->objectTypeId,
			'object_body' => $this->objectBody,
			'object_meta' => $this->objectMeta,
		]);
	}


	public function defaultQuery(): array
	{
		return array_filter([
			'object_name' => $this->objectName,
			'object_meta' => $this->objectMeta,
			'object_extension' => $this->objectExtension,
			'object_type_id' => $this->objectTypeId,
			'object_body' => $this->objectBody,
			'encrypt' => $this->encrypt,
		]);
	}
}
