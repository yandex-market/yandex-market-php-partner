<?php

namespace Yandex\Beru\Partner\Models\Response;

use Yandex\Beru\Partner\Models\Order;
use Yandex\Common\Model;

class AcceptOrderResponse extends Model
{
    protected $order;

    protected $mappingClasses = [
        'order' => Order::class
    ];

    /**
     * @return Order
     */
    public function getOrder()
    {
        return $this->order;
    }
}
