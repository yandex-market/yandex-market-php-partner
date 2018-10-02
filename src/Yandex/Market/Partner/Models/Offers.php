<?php

namespace Yandex\Market\Partner\Models;

use Yandex\Common\ObjectModel;

/**
 * Class Offers
 *
 * @package Yandex\Market\Partner\Models
 */
class Offers extends ObjectModel
{
    /**
     * @param array|object $offer
     *
     * @return Offers
     */
    public function add($offer)
    {
        if (is_array($offer)) {
            $this->collection[] = new Offer($offer);
        } elseif (is_object($offer) && $offer instanceof Offer) {
            $this->collection[] = $offer;
        }
        return $this;
    }

    /**
     * Get items
     *
     * @return Offer[]
     */
    public function getAll()
    {
        return $this->collection;
    }

    /**
     * @return Offer
     */
    public function current()
    {
        return parent::current();
    }
}
