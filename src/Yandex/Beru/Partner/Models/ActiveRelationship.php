<?php

namespace Yandex\Beru\Partner\Models;

use Yandex\Common\ObjectModel;

class ActiveRelationship extends ObjectModel
{
    /**
     * @param array|object $activeRelation
     *
     * @return ActiveRelationship
     */
    public function add($activeRelation)
    {
        if (is_array($activeRelation)) {
            $this->collection[] = new ActiveRelation($activeRelation);
        } elseif (is_object($activeRelation) && $activeRelation instanceof ActiveRelation) {
            $this->collection[] = $activeRelation;
        }
        return $this;
    }
    /**
     * Get items
     *
     * @return ActiveRelation[]
     */
    public function getAll()
    {
        return $this->collection;
    }

    /**
     * @return ActiveRelation
     */
    public function current()
    {
        return parent::current();
    }
}
