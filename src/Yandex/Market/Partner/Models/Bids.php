<?php

namespace Yandex\Market\Partner\Models;

use Yandex\Common\ObjectModel;

/**
 * Class Bids
 *
 * @package Yandex\Market\Partner\Models
 */
class Bids extends ObjectModel
{
    /**
     * @param array|object $bid
     *
     * @return Bids
     */
    public function add($bid)
    {
        if (is_array($bid)) {
            $this->collection[] = new Bid($bid);
        } elseif (is_object($bid) && $bid instanceof Bid) {
            $this->collection[] = $bid;
        }
        return $this;
    }

    /**
     * Get items
     *
     * @return Bid[]
     */
    public function getAll()
    {
        return $this->collection;
    }

    /**
     * @return Bid
     */
    public function current()
    {
        return parent::current();
    }
}
