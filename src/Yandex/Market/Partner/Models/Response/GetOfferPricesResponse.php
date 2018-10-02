<?php

namespace Yandex\Market\Partner\Models\Response;

use Yandex\Common\Model;
use Yandex\Market\Partner\Models\OfferPrices;

class GetOfferPricesResponse extends Model
{
    protected $result;
    protected $status;

    protected $mappingClasses = [
        'result' => OfferPrices::class,
    ];

    /**
     * @return OfferPrices
     */
    public function getResult()
    {
        return $this->result;
    }

    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }
}
