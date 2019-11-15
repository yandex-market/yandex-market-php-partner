<?php

namespace Yandex\Market\Partner\Models;

use Yandex\Common\ObjectModel;

class DeliveryServices extends ObjectModel
{
    /**
     * @param array|object $deliveryService
     *
     * @return DeliveryServices
     */
    public function add($deliveryService)
    {
        if (is_array($deliveryService)) {
            $this->collection[] = new DeliveryService($deliveryService);
        } elseif (is_object($deliveryService) && $deliveryService instanceof DeliveryService) {
            $this->collection[] = $deliveryService;
        }
        return $this;
    }

    /**
     * Get items
     *
     * @return DeliveryService[]
     */
    public function getAll()
    {
        return $this->collection;
    }

    /**
     * @return DeliveryService
     */
    public function current()
    {
        return parent::current();
    }
}