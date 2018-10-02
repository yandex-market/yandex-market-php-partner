<?php

namespace Yandex\Market\Partner\Models;

use Yandex\Common\ObjectModel;

class MarketModels extends ObjectModel
{
    /**
     * @param array|object $marketModel
     *
     * @return MarketModels
     */
    public function add($marketModel)
    {
        if (is_array($marketModel)) {
            $this->collection[] = new MarketModel($marketModel);
        } elseif (is_object($marketModel) && $marketModel instanceof MarketModel) {
            $this->collection[] = $marketModel;
        }
        return $this;
    }

    /**
     * Get items
     *
     * @return MarketModel[]
     */
    public function getAll()
    {
        return $this->collection;
    }

    /**
     * @return MarketModel
     */
    public function current()
    {
        return parent::current();
    }
}
