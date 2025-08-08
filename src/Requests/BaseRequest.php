<?php

namespace ChrisReedIO\MultiloginSDK\Requests;

use Saloon\Http\Request;
use Saloon\Http\Response;

abstract class BaseRequest extends Request
{
    protected ?string $dataSubKey = null;

    public function createDtoFromResponse(Response $response): mixed
    {
        $dataKey = $this->dataSubKey ? "data.{$this->dataSubKey}" : 'data';

        return $response->json($dataKey);
    }
}
