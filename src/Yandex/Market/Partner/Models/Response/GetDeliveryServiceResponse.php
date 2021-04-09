<?php

namespace Yandex\Market\Partner\Models\Response;

use Yandex\Common\Model;
use Yandex\Market\Partner\Models\DeliveryServices;

class GetDeliveryServiceResponse extends Model
{
    protected $deliveryService;

    protected $mappingClasses = [
        'deliveryService' => DeliveryServices::class,
    ];

    /**
     * @return DeliveryServices
     */
    public function getDeliveryService()
    {
        return $this->deliveryService;
    }
}
