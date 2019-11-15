<?php

namespace Yandex\Market\Partner\Models;

use Yandex\Common\ObjectModel;

class OfferPrices extends ObjectModel
{
    protected $total;

    public function __construct(array $data = [])
    {
        $this->total = $data['total'];
        parent::__construct($data['offers']);
    }

    /**
     * @param array|object $offerPrice
     *
     * @return OfferPrices
     */
    public function add($offerPrice)
    {
        if (is_array($offerPrice)) {
            $this->collection[] = new OfferPrice($offerPrice);
        } elseif (is_object($offerPrice) && $offerPrice instanceof OfferPrice) {
            $this->collection[] = $offerPrice;
        }
        return $this;
    }

    /**
     * Get items
     *
     * @return OfferPrice[]
     */
    public function getAll()
    {
        return $this->collection;
    }

    /**
     * @return OfferPrice
     */
    public function current()
    {
        return parent::current();
    }

    /**
     * @return int
     */
    public function getTotal()
    {
        return $this->total;
    }
}
