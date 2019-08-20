<?php

namespace Yandex\Beru\Partner\Models;

use Yandex\Common\ObjectModel;

class RecommendedPrices extends ObjectModel
{
    /**
     * @param array|object $recommendedPrice
     *
     * @return RecommendedPrices
     */
    public function add($recommendedPrice)
    {
        if (is_array($recommendedPrice)) {
            $this->collection[] = new RecommendedPrice($recommendedPrice);
        } elseif (is_object($recommendedPrice) && $recommendedPrice instanceof RecommendedPrice) {
            $this->collection[] = $recommendedPrice;
        }
        return $this;
    }

    /**
     * Get items
     *
     * @return RecommendedPrice[]
     */
    public function getAll()
    {
        return $this->collection;
    }

    /**
     * @return RecommendedPrice
     */
    public function current()
    {
        return parent::current();
    }
}
