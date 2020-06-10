<?php

namespace Yandex\Market\Partner\Models;

use Yandex\Common\ObjectModel;

class Pcps extends ObjectModel
{
    /**
     * @param array|object $pcp
     *
     * @return Pcps
     */
    public function add($pcp)
    {
        if (is_array($pcp)) {
            $this->collection[] = new Pcp($pcp);
        } elseif (is_object($pcp) && $pcp instanceof Pcp) {
            $this->collection[] = $pcp;
        }
        return $this;
    }

    /**
     * Get items
     *
     * @return Pcp[]
     */
    public function getAll()
    {
        return $this->collection;
    }

    /**
     * @return Pcp
     */
    public function current()
    {
        return parent::current();
    }
}
