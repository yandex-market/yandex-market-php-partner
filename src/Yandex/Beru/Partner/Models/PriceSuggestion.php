<?php

namespace Yandex\Beru\Partner\Models;

use Yandex\Common\Model;

class PriceSuggestion extends Model
{
    protected $type;
    protected $price;
    protected $period;

    protected $mappingClasses = [
        'period' => Period::class,
    ];

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @return double
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @return Period
     */
    public function getPeriod()
    {
        return $this->period;
    }
}
