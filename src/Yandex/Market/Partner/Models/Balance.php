<?php

namespace Yandex\Market\Partner\Models;

use Yandex\Common\Model;

class Balance extends Model
{
    protected $balance;
    protected $daysLeft;
    protected $recommendedPayment;

    /**
     * @return double
     */
    public function getBalance()
    {
        return $this->balance;
    }

    /**
     * @return int
     */
    public function getDaysLeft()
    {
        return $this->daysLeft;
    }

    /**
     * @return double
     */
    public function getRecommendedPayment()
    {
        return $this->recommendedPayment;
    }
}
