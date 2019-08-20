<?php

namespace Yandex\Beru\Partner\Models;

use Yandex\Common\ObjectModel;

class Boxes extends ObjectModel
{
    /**
     * @param array|object $box
     *
     * @return Boxes
     */
    public function add($box)
    {
        if (is_array($box)) {
            $this->collection[] = new Box($box);
        } elseif (is_object($box) && $box instanceof Box) {
            $this->collection[] = $box;
        }
        return $this;
    }

    /**
     * Get items
     *
     * @return Box[]
     */
    public function getAll()
    {
        return $this->collection;
    }

    /**
     * @return Box
     */
    public function current()
    {
        return parent::current();
    }
}