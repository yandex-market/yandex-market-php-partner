<?php

namespace Yandex\Beru\Partner\Models;

use Yandex\Common\ObjectModel;

class Shipments extends ObjectModel
{
    /**
     * @param array|object $shipment
     *
     * @return Shipments
     */
    public function add($shipment)
    {
        if (is_array($shipment)) {
            $this->collection[] = new Shipment($shipment);
        } elseif (is_object($shipment) && $shipment instanceof Shipment) {
            $this->collection[] = $shipment;
        }
        return $this;
    }

    /**
     * Get items
     *
     * @return Shipment[]
     */
    public function getAll()
    {
        return $this->collection;
    }

    /**
     * @return Shipment
     */
    public function current()
    {
        return parent::current();
    }
}
