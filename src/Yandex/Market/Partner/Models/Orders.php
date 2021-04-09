<?php

namespace Yandex\Market\Partner\Models;

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
            $this->collection[] = new OrderInfo($order);
        } elseif (is_object($order) && $order instanceof OrderInfo) {
            $this->collection[] = $order;
        }
        return $this;
    }

    /**
     * Get items
     *
     * @return OrderInfo[]
     */
    public function getAll()
    {
        return $this->collection;
    }

    /**
     * @return OrderInfo
     */
    public function current()
    {
        return parent::current();
    }
}
