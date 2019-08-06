<?php

namespace Yandex\Beru\Partner\Models;

use Yandex\Common\Model;

class Promo extends Model
{
    protected $marketPromoId;
    protected $subsidy;
    protected $type;

    /**
     * @return string
     */
    public function getMarketPromoId()
    {
        return $this->marketPromoId;
    }

    /**
     * @return float
     */
    public function getSubsidy()
    {
        return $this->subsidy;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }
}