<?php

namespace Yandex\Market\Partner\Models\Response;

use Yandex\Common\Model;
use Yandex\Market\Partner\Models\Common\Pager;
use Yandex\Market\Partner\Models\Orders;

class GetOrdersResponse extends Model
{
    protected $orders;
    protected $pager;

    protected $mappingClasses = [
        'orders' => Orders::class,
        'pager' => Pager::class,
    ];

    /**
     * @return Orders
     */
    public function getOrders()
    {
        return $this->orders;
    }

    /**
     * @return Pager
     */
    public function getPager()
    {
        return $this->pager;
    }
}
