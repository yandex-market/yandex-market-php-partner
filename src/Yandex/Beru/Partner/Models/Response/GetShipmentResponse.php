<?php

namespace Yandex\Beru\Partner\Models\Response;

use Yandex\Common\Model;
use Yandex\Beru\Partner\Models\ShipmentRequestDetails;

class GetShipmentResponse extends Model
{
    protected $shipmentRequest;

    public function __construct(array $data = [])
    {
        parent::__construct($data['result']);
    }

    protected $mappingClasses = [
        'shipmentRequest' => ShipmentRequestDetails::class,
    ];

    /**
     * @return ShipmentRequestDetails
     */
    public function getShipmentRequest()
    {
        return $this->shipmentRequest;
    }
}