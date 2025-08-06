<?php

namespace ChrisReedIO\MultiloginSDK\Requests\ProfileAccessManagement;

use DateTime;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Workspace Leave
 */
class WorkspaceLeave extends Request implements HasBody
{
	use HasJsonBody;

	protected Method $method = Method::POST;


	public function resolveEndpoint(): string
	{
		return "/workspace/leave";
	}


	/**
	 * @param null|mixed $workspaceId
	 * @param null|string $workspaceId `Required`. Specify the workspace, which you would like to leave.
	 */
	public function __construct(
		protected ?string $workspaceId = null,
	) {
	}


	public function defaultBody(): array
	{
		return array_filter(['workspace_id' => $this->workspaceId]);
	}


	public function defaultQuery(): array
	{
		return array_filter(['workspace_id' => $this->workspaceId]);
	}


	public function defaultHeaders(): array
	{
		return array_filter([]);
	}
}
