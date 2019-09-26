<?php

namespace Yandex\Market\Partner\Models;

use Yandex\Common\ObjectModel;

class FeedbackList extends ObjectModel
{
    /**
     * @param array|object $feedback
     *
     * @return FeedbackList
     */
    public function add($feedback)
    {
        if (is_array($feedback)) {
            $this->collection[] = new Feedback($feedback);
        } elseif (is_object($feedback) && $feedback instanceof Feedback) {
            $this->collection[] = $feedback;
        }
        return $this;
    }

    /**
     * Get items
     *
     * @return Feedback[]
     */
    public function getAll()
    {
        return $this->collection;
    }

    /**
     * @return Feedback
     */
    public function current()
    {
        return parent::current();
    }
}