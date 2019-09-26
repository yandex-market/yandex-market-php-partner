<?php

namespace Yandex\Market\Partner\Models;

use Yandex\Common\ObjectModel;

class ChildrenComments extends ObjectModel
{
    /**
     * @param array|object $childrenComment
     *
     * @return ChildrenComments
     */
    public function add($childrenComment)
    {
        if (is_array($childrenComment)) {
            $this->collection[] = new ChildrenComment($childrenComment);
        } elseif (is_object($childrenComment) && $childrenComment instanceof ChildrenComment) {
            $this->collection[] = $childrenComment;
        }
        return $this;
    }

    /**
     * Get items
     *
     * @return ChildrenComment[]
     */
    public function getAll()
    {
        return $this->collection;
    }

    /**
     * @return ChildrenComment
     */
    public function current()
    {
        return parent::current();
    }
}