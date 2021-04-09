<?php

namespace Yandex\Market\Partner\Models;

use Yandex\Common\ObjectModel;

class Promos extends ObjectModel
{
    /**
     * @param array|object $promo
     *
     * @return Promos
     */
    public function add($promo)
    {
        if (is_array($promo)) {
            $this->collection[] = new Promo($promo);
        } elseif (is_object($promo) && $promo instanceof Promo) {
            $this->collection[] = $promo;
        }
        return $this;
    }

    /**
     * Get items
     *
     * @return Promo[]
     */
    public function getAll()
    {
        return $this->collection;
    }

    /**
     * @return Promo
     */
    public function current()
    {
        return parent::current();
    }
}
