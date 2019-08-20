<?php

namespace Yandex\Beru\Partner\Models\Response;

use Yandex\Common\Model;
use Yandex\Beru\Partner\Models\ShipmentItems;

class GetShipmentItemsResponse extends Model
{
    protected $shipmentItems;
    protected $paging;

    protected $mappingClasses = [
        'shipmentItems' => ShipmentItems::class,
    ];

    public function __construct(array $data = [])
    {
        parent::__construct($data['result']);
    }

    /**
     * @return ShipmentItems
     */
    public function getShipmentItems()
    {
        return $this->shipmentItems;
    }

    /**
     * @return mixed
     */
    public function getNextPageToken()
    {
        if (isset($this->paging['nextPageToken'])) {
            return $this->paging['nextPageToken'];
        }
        return null;
    }
}
