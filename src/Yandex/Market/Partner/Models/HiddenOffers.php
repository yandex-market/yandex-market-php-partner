<?php

namespace Yandex\Market\Partner\Models;

use Yandex\Common\ObjectModel;

/**
 * Class Campaigns
 *
 * @package Yandex\Market\Partner\Models\Campaign
 */
class HiddenOffers extends ObjectModel
{
    /**
     * @param array|object $feed
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
