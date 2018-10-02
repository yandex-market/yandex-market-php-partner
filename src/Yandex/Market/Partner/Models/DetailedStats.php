<?php

namespace Yandex\Market\Partner\Models;

use Yandex\Common\ObjectModel;

class DetailedStats extends ObjectModel
{
    /**
     * @param array|object $stat
     *
     * @return DetailedStats
     */
    public function add($stat)
    {
        if (is_array($stat)) {
            $this->collection[] = new DetailedStat($stat);
        } elseif (is_object($stat) && $stat instanceof DetailedStat) {
            $this->collection[] = $stat;
        }
        return $this;
    }

    /**
     * Get items
     *
     * @return DetailedStat[]
     */
    public function getAll()
    {
        return $this->collection;
    }

    /**
     * @return DetailedStat
     */
    public function current()
    {
        return parent::current();
    }
}
