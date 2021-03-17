<?php

namespace Yandex\Market\Partner\Models\Response;

use Yandex\Common\Model;
use Yandex\Market\Partner\Models\OrderInfo;

class AcceptOrderResponse extends Model
{
    protected $order;

    protected $mappingClasses = [
        'order' => OrderInfo::class
    ];

    /**
     * @return OrderInfo
     */
    public function getOrder()
    {
        return $this->order;
    }
}