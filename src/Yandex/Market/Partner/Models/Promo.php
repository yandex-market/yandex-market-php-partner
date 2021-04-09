<?php

namespace Yandex\Market\Partner\Models;

use Yandex\Common\Model;

class Promo extends Model
{
    const TYPE_MARKET_COUPON = "MARKET_COUPON";
    const TYPE_MARKET_DEAL = "MARKET_DEAL";
    const TYPE_MARKET_COIN = "MARKET_COIN";

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
