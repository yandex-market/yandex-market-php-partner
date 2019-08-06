<?php

namespace Yandex\Beru\Partner\Models;

use Yandex\Common\ObjectModel;

class PricesSuggestion extends ObjectModel
{
    /**
     * @param array|object $priceSuggestion
     *
     * @return PricesSuggestion
     */
    public function add($priceSuggestion)
    {
        if (is_array($priceSuggestion)) {
            $this->collection[] = new PriceSuggestion($priceSuggestion);
        } elseif (is_object($priceSuggestion) && $priceSuggestion instanceof PriceSuggestion) {
            $this->collection[] = $priceSuggestion;
        }
        return $this;
    }

    /**
     * Get items
     *
     * @return PriceSuggestion[]
     */
    public function getAll()
    {
        return $this->collection;
    }

    /**
     * @return PriceSuggestion
     */
    public function current()
    {
        return parent::current();
    }
}
