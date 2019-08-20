<?php

namespace Yandex\Beru\Partner\Models\Response;

use Yandex\Common\Model;
use Yandex\Beru\Partner\Models\Order;

class GetUpdateOrderResponse extends Model
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
