<?php

namespace Yandex\Market\Partner\Models;

use Yandex\Common\ObjectModel;

class Comments extends ObjectModel
{
    /**
     * @param array|object $comment
     *
     * @return Comments
     */
    public function add($comment)
    {
        if (is_array($comment)) {
            $this->collection[] = new Comment($comment);
        } elseif (is_object($comment) && $comment instanceof Comment) {
            $this->collection[] = $comment;
        }
        return $this;
    }

    /**
     * Get items
     *
     * @return Comment[]
     */
    public function getAll()
    {
        return $this->collection;
    }

    /**
     * @return Comment
     */
    public function current()
    {
        return parent::current();
    }
}