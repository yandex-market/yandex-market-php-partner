<?php

namespace Yandex\Market\Partner\Models;

use Yandex\Common\Model;

class Publication extends Model
{
    const STATUS_NA = 'NA';
    const STATUS_OK = 'OK';

    protected $status;
    protected $full;
    protected $priceAndStockUpdate;

    protected $mappingClasses = [
        'full' => PublicationFull::class,
        'priceAndStockUpdate' => PriceAndStockUpdate::class,
    ];

    /**
     * @return String
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @return PublicationFull
     */
    public function getFull()
    {
        return $this->full;
    }

    /**
     * @return PriceAndStockUpdate
     */
    public function getPriceAndStockUpdate()
    {
        return $this->priceAndStockUpdate;
    }
}
