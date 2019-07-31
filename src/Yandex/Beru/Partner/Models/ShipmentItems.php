<?php

namespace Yandex\Beru\Partner\Models;

use Yandex\Common\ObjectModel;

class ShipmentItems extends ObjectModel
{
    /**
     * @param array|object $shipmentItem
     *
     * @return ShipmentItems
     */
    public function add($shipmentItem)
    {
        if (is_array($shipmentItem)) {
            $this->collection[] = new ShipmentItem($shipmentItem);
        } elseif (is_object($shipmentItem) && $shipmentItem instanceof ShipmentItem) {
            $this->collection[] = $shipmentItem;
        }
        return $this;
    }
    /**
     * Get items
     *
     * @return ShipmentItem[]
     */
    public function getAll()
    {
        return $this->collection;
    }

    /**
     * @return ShipmentItem
     */
    public function current()
    {
        return parent::current();
    }
}
