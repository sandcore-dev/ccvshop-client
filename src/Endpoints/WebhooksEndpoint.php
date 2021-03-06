<?php

namespace JacobDeKeizer\Ccv\Endpoints;

use JacobDeKeizer\Ccv\Exceptions\CcvShopException;
use JacobDeKeizer\Ccv\Models\Webhooks as Models;
use JacobDeKeizer\Ccv\Parameters\Webhooks\All;

class WebhooksEndpoint extends BaseEndpoint
{
    /**
     * @throws CcvShopException
     */
    public function all(?All $payload = null): Models\Collection\Webhooks
    {
        if ($payload === null) {
            $payload = new All();
        }

        $result = $this->doRequest(self::GET, sprintf('/webhooks/%s', $payload->toBuilder()->toQueryString()));

        return Models\Collection\Webhooks::fromArray($result);
    }

    /**
     * @throws CcvShopException
     */
    public function get(int $id): Models\Resource\Webhooks
    {
        $result = $this->doRequest(self::GET, sprintf('/webhooks/%d/', $id));

        return Models\Resource\Webhooks::fromArray($result);
    }

    /**
     * @throws CcvShopException
     */
    public function create(Models\Webhooks\Post $model, bool $onlyFilled = true): Models\Resource\Webhooks
    {
        $result = $this->doRequest(self::POST, '/webhooks/', $model->toArray($onlyFilled));

        return Models\Resource\Webhooks::fromArray($result);
    }

    /**
     * @throws CcvShopException
     */
    public function update(int $id, Models\Webhooks\Patch $model, bool $onlyFilled = true): void
    {
        $this->doRequest(self::PATCH, sprintf('/webhooks/%d/', $id), $model->toArray($onlyFilled));
    }

    /**
     * @throws CcvShopException
     */
    public function delete(int $id): void
    {
        $this->doRequest(self::DELETE, sprintf('/webhooks/%d/', $id));
    }
}
