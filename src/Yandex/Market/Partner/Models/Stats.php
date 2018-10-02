<?php

namespace Yandex\Market\Partner\Models;

use Yandex\Common\ObjectModel;

class Stats extends ObjectModel
{
    /**
     * @param array|object $stat
     *
     * @return Stats
     */
    public function add($stat)
    {
        if (is_array($stat)) {
            $this->collection[] = new Stat($stat);
        } elseif (is_object($stat) && $stat instanceof Stat) {
            $this->collection[] = $stat;
        }
        return $this;
    }

    /**
     * Get items
     *
     * @return Stat[]
     */
    public function getAll()
    {
        return $this->collection;
    }

    /**
     * @return Stat
     */
    public function current()
    {
        return parent::current();
    }
}
