<?php

namespace Yandex\Market\Partner\Models;

use Yandex\Common\Model;

class Cart extends Model
{
    const CURRENCY_RUR = "RUR";
    const DELIVERY_CURRENCY_RUR = "RUR";

    protected $currency;
    protected $delivery;
    protected $deliveryCurrency;
    protected $items;

    protected $mappingClasses = [
        'delivery' => DeliveryCart::class,
        'items' => Items::class,
    ];

    /**
     * @return string
     */
    public function getCurrency()
    {
        return $this->currency;
    }

    /**
     * @return DeliveryCart
     */
    public function getDelivery()
    {
        return $this->delivery;
    }

    /**
     * @return Items
     */
    public function getItems()
    {
        return $this->items;
    }

    /**
     * @return string
     */
    public function getDeliveryCurrency()
    {
        return $this->deliveryCurrency;
    }
}
