<?php

namespace Yandex\Market\Partner\Models;

use Yandex\Common\ObjectModel;

class Instances extends ObjectModel
{
    /**
     * @param array|object $instance
     *
     * @return Instances
     */
    public function add($instance)
    {
        if (is_array($instance)) {
            $this->collection[] = new Instance($instance);
        } elseif (is_object($instance) && $instance instanceof Instance) {
            $this->collection[] = $instance;
        }
        return $this;
    }

    /**
     * Get items
     *
     * @return Instance[]
     */
    public function getAll()
    {
        return $this->collection;
    }

    /**
     * @return Instance
     */
    public function current()
    {
        return parent::current();
    }
}
