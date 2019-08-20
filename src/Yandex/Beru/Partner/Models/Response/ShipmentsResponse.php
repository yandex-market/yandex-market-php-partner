<?php

namespace Yandex\Beru\Partner\Models\Response;

use Yandex\Beru\Partner\Models\ShipmentRequest;
use Yandex\Common\Model;

class ShipmentsResponse extends Model
{
    protected $shipmentRequest;

    public function __construct(array $data = [])
    {
        parent::__construct($data['result']);
    }

    protected $mappingClasses = [
        'shipmentRequest' => ShipmentRequest::class,
    ];

    /**
     * @return ShipmentRequest
     */
    public function getShipmentRequest()
    {
        return $this->shipmentRequest;
    }
}
