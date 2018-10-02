<?php

namespace Yandex\Market\Partner\Models;

use Yandex\Common\ObjectModel;

class Outlets extends ObjectModel
{
    /**
     * @param array|object $outlet
     *
     * @return Outlets
     */
    public function add($outlet)
    {
        if (is_array($outlet)) {
            $this->collection[] = new Outlet($outlet);
        } elseif (is_object($outlet) && $outlet instanceof Outlet) {
            $this->collection[] = $outlet;
        }
        return $this;
    }

    /**
     * Get items
     *
     * @return Outlet[]
     */
    public function getAll()
    {
        return $this->collection;
    }

    /**
     * @return Outlet
     */
    public function current()
    {
        return parent::current();
    }
}
