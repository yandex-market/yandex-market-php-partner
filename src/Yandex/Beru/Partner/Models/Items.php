<?php

namespace Yandex\Beru\Partner\Models;

use Yandex\Common\ObjectModel;

class Items extends ObjectModel
{
    /**
     * @param array|object $item
     *
     * @return Items
     */
    public function add($item)
    {
        if (is_array($item)) {
            $this->collection[] = new Item($item);
        } elseif (is_object($item) && $item instanceof Item) {
            $this->collection[] = $item;
        }
        return $this;
    }

    /**
     * Get items
     *
     * @return Item[]
     */
    public function getAll()
    {
        return $this->collection;
    }

    /**
     * @return Item
     */
    public function current()
    {
        return parent::current();
    }
}
