<?php

namespace Yandex\Market\Partner\Models;

use Yandex\Common\ObjectModel;

/**
 * Class Regions
 *
 * @package Yandex\Market\Partner\Models
 */
class Regions extends ObjectModel
{
    /**
     * @param array|object $region
     *
     * @return Regions
     */
    public function add($region)
    {
        if (is_array($region)) {
            $this->collection[] = new Region($region);
        } elseif (is_object($region) && $region instanceof Region) {
            $this->collection[] = $region;
        }
        return $this;
    }

    /**
     * Get items
     *
     * @return Region[]
     */
    public function getAll()
    {
        return $this->collection;
    }

    /**
     * @return Region
     */
    public function current()
    {
        return parent::current();
    }
}
