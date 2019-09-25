<?php

namespace Yandex\Market\Partner\Models;

use Yandex\Common\Model;

class Order extends Model
{
    protected $shopOrderId;
    protected $delivery;

    /**
     * @return string
     */
    public function getShopOrderId()
    {
        return $this->shopOrderId;
    }

    /**
     * @return string
     */
    public function getDelivery()
    {
        return $this->delivery;
    }
}