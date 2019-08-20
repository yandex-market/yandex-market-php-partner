<?php

namespace Yandex\Beru\Partner\Models;

use Yandex\Common\ObjectModel;

class Orders extends ObjectModel
{
    /**
     * @param array|object $order
     *
     * @return Orders
     */
    public function add($order)
    {
        if (is_array($order)) {
            $this->collection[] = new Order($order);
        } elseif (is_object($order) && $order instanceof Order) {
            $this->collection[] = $order;
        }
        return $this;
    }

    /**
     * Get items
     *
     * @return Order[]
     */
    public function getAll()
    {
        return $this->collection;
    }

    /**
     * @return Order
     */
    public function current()
    {
        return parent::current();
    }
}