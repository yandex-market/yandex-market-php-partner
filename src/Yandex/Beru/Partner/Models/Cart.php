<?php

namespace Yandex\Beru\Partner\Models;

use Yandex\Common\Model;

class Cart extends Model
{
    protected $currency;
    protected $delivery;
    protected $items;

    protected $mappingClasses = [
        'delivery' => Delivery::class,
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
     * @return Delivery
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
}
