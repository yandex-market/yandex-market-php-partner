<?php

namespace Yandex\Market\Partner\Models;

use Yandex\Common\ObjectModel;

class Intervals extends ObjectModel
{
    /**
     * @param array|object $interval
     *
     * @return Intervals
     */
    public function add($interval)
    {
        if (is_array($interval)) {
            $this->collection[] = new Interval($interval);
        } elseif (is_object($interval) && $interval instanceof Interval) {
            $this->collection[] = $interval;
        }
        return $this;
    }

    /**
     * Get items
     *
     * @return Interval[]
     */
    public function getAll()
    {
        return $this->collection;
    }

    /**
     * @return Interval
     */
    public function current()
    {
        return parent::current();
    }
}
