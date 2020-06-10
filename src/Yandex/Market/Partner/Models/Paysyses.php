<?php

namespace Yandex\Market\Partner\Models;

use Yandex\Common\ObjectModel;

class Paysyses extends ObjectModel
{
    /**
     * @param array|object $paysys
     *
     * @return Paysyses
     */
    public function add($paysys)
    {
        if (is_array($paysys)) {
            $this->collection[] = new Paysys($paysys);
        } elseif (is_object($paysys) && $paysys instanceof Paysys) {
            $this->collection[] = $paysys;
        }
        return $this;
    }

    /**
     * Get items
     *
     * @return Paysys[]
     */
    public function getAll()
    {
        return $this->collection;
    }

    /**
     * @return Paysys
     */
    public function current()
    {
        return parent::current();
    }
}
