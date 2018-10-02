<?php

namespace Yandex\Market\Partner\Models;

use Yandex\Common\ObjectModel;

class MarketModelOffers extends ObjectModel
{
    /**
     * @param array|object $marketModelOffers
     *
     * @return MarketModelOffers
     */
    public function add($marketModelOffers)
    {
        if (is_array($marketModelOffers)) {
            $this->collection[] = new MarketModelOffer($marketModelOffers);
        } elseif (is_object($marketModelOffers) && $marketModelOffers instanceof MarketModelOffer) {
            $this->collection[] = $marketModelOffers;
        }
        return $this;
    }

    /**
     * Get items
     *
     * @return MarketModelOffer[]
     */
    public function getAll()
    {
        return $this->collection;
    }

    /**
     * @return MarketModelOffer
     */
    public function current()
    {
        return parent::current();
    }
}
