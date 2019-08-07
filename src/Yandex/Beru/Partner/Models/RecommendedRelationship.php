<?php

namespace Yandex\Beru\Partner\Models;

use Yandex\Common\ObjectModel;

class RecommendedRelationship extends ObjectModel
{
    /**
     * @param array|object $recommendedRelationship
     *
     * @return $this
     */
    public function add($recommendedRelationship)
    {
        if (is_array($recommendedRelationship)) {
            $this->collection[] = new RecommendedRelation($recommendedRelationship);
        } elseif (is_object($recommendedRelationship) && $recommendedRelationship instanceof RecommendedRelation) {
            $this->collection[] = $recommendedRelationship;
        }

        return $this;
    }

    /**
     * Get items
     *
     * @return RecommendedRelation[]
     */
    public function getAll()
    {
        return $this->collection;
    }

    /**
     * @return RecommendedRelation
     */
    public function current()
    {
        return parent::current();
    }
}
