<?php

namespace Yandex\Beru\Partner\Models;

use phpDocumentor\Reflection\Types\Integer;
use Yandex\Common\Model;

class Price extends Model
{
    protected $currencyId;
    protected $discountBase;
    protected $value;
    protected $vat;

    /**
     * @return string
     */
    public function getCurrencyId()
    {
        return $this->currencyId;
    }

    /**
     * @return double
     */
    public function getDiscountBase()
    {
        return $this->discountBase;
    }

    /**
     * @return double
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @return int
     */
    public function getVat()
    {
        return $this->vat;
    }
}
