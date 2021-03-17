<?php

namespace JacobDeKeizer\Ccv\Endpoints;

use JacobDeKeizer\Ccv\Models\Colors as Models;
use JacobDeKeizer\Ccv\Parameters\Colors\All;

class ColorsEndpoint extends BaseEndpoint
{
    public function all(?All $payload = null): Models\Collection\Colors
    {
        if ($payload === null) {
            $payload = new All();
        }

        $result = $this->doRequest(
            self::GET,
            sprintf('colors/%s', $payload->toBuilder()->toQueryString())
        );

        return Models\Collection\Colors::fromArray($result);
    }

    public function get(int $id): Models\Resource\Colors
    {
        $result = $this->doRequest(self::GET, 'colors/' . $id . '/');

        return Models\Resource\Colors::fromArray($result);
    }

    public function create(Models\Colors\Post $model, bool $onlyFilledProperties = true): Models\Resource\Colors
    {
        $response = $this->doRequest(self::POST, 'colors/', $model->toArray($onlyFilledProperties));

        return Models\Resource\Colors::fromArray($response);
    }
}
