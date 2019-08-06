<?php

namespace Yandex\Beru\Partner\Models;

use Yandex\Common\ObjectModel;

class ItemsOrder extends ObjectModel
{
    /**
     * @param array|object $itemOrder
     *
     * @return ItemsOrder
     */
    public function add($itemOrder)
    {
        if (is_array($itemOrder)) {
            $this->collection[] = new ItemOrder($itemOrder);
        } elseif (is_object($itemOrder) && $itemOrder instanceof ItemOrder) {
            $this->collection[] = $itemOrder;
        }
        return $this;
    }

    /**
     * Get items
     *
     * @return ItemOrder[]
     */
    public function getAll()
    {
        return $this->collection;
    }

    /**
     * @return ItemOrder
     */
    public function current()
    {
        return parent::current();
    }
}