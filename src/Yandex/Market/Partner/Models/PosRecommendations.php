<?php

namespace Yandex\Market\Partner\Models;

use Yandex\Common\ObjectModel;

class PosRecommendations extends ObjectModel
{
    /**
     * @param array|object $position
     *
     * @return PosRecommendations
     */
    public function add($position)
    {
        if (is_array($position)) {
            $this->collection[] = new Position($position);
        } elseif (is_object($position) && $position instanceof Position) {
            $this->collection[] = $position;
        }
        return $this;
    }

    /**
     * Get items
     *
     * @return PosRecommendations[]
     */
    public function getAll()
    {
        return $this->collection;
    }

    /**
     * @return Position
     */
    public function current()
    {
        return parent::current();
    }
}