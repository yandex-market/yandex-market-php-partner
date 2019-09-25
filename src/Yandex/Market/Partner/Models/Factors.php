<?php

namespace Yandex\Market\Partner\Models;

use Yandex\Common\ObjectModel;

class Factors extends ObjectModel
{
    /**
     * @param array|object $factor
     *
     * @return Factors
     */
    public function add($factor)
    {
        if (is_array($factor)) {
            $this->collection[] = new Factor($factor);
        } elseif (is_object($factor) && $factor instanceof Factor) {
            $this->collection[] = $factor;
        }
        return $this;
    }

    /**
     * Get items
     *
     * @return Factor[]
     */
    public function getAll()
    {
        return $this->collection;
    }

    /**
     * @return Factor
     */
    public function current()
    {
        return parent::current();
    }
}