<?php

namespace Yandex\Beru\Partner\Models;

use Yandex\Common\ObjectModel;

class HiddenOffers extends ObjectModel
{
    /**
     * @param array|object $hiddenOffer
     *
     * @return HiddenOffers
     */
    public function add($hiddenOffer)
    {
        if (is_array($hiddenOffer)) {
            $this->collection[] = new HiddenOffer($hiddenOffer);
        } elseif (is_object($hiddenOffer) && $hiddenOffer instanceof HiddenOffer) {
            $this->collection[] = $hiddenOffer;
        }
        return $this;
    }

    /**
     * Get items
     *
     * @return HiddenOffer[]
     */
    public function getAll()
    {
        return $this->collection;
    }

    /**
     * @return HiddenOffer
     */
    public function current()
    {
        return parent::current();
    }
}
