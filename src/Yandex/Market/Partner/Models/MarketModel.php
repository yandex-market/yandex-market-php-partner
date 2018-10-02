<?php

namespace Yandex\Market\Partner\Models;

use Yandex\Common\Model;

class MarketModel extends Model
{
    protected $id;
    protected $name;
    protected $prices;

    protected $mappingClasses = [
        'prices' => ModelPrices::class,
    ];

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return ModelPrices
     */
    public function getPrices()
    {
        return $this->prices;
    }
}
