<?php

namespace Yandex\Beru\Partner\Models\Response;

use Yandex\Common\Model;

class StocksResponse extends Model
{
    protected $warehouseId;
    protected $skus;

    /**
     * @return int
     */
    public function getWarehouseId()
    {
        return $this->warehouseId;
    }

    /**
     * @return string
     */
    public function getSkus()
    {
        return $this->skus;
    }
}