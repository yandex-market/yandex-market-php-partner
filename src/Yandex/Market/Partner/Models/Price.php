<?php

namespace Yandex\Market\Partner\Models;

use Yandex\Common\Model;

class Price extends Model
{
    public $currencyId;
    public $discountBase;
    public $value;

    /**
     * @return String
     */
    public function getCurrencyId()
    {
        return $this->currencyId;
    }

    /**
     * @return Float
     */
    public function getDiscountBase()
    {
        return $this->discountBase;
    }

    /**
     * @return Float
     */
    public function getValue()
    {
        return $this->value;
    }
}
