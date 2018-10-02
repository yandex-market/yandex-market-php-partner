<?php

namespace Yandex\Market\Partner\Models;

use Yandex\Common\Model;

class ModelPrices extends Model
{
    protected $avg;
    protected $max;
    protected $min;

    /**
     * @return float
     */
    public function getAvg()
    {
        return $this->avg;
    }

    /**
     * @return float
     */
    public function getMax()
    {
        return $this->max;
    }

    /**
     * @return float
     */
    public function getMin()
    {
        return $this->min;
    }
}
