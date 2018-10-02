<?php

namespace Yandex\Market\Partner\Models;

use Yandex\Common\ObjectModel;

/**
 * Class Campaigns
 *
 * @package Yandex\Market\Partner\Models\Campaign
 */
class Categories extends ObjectModel
{
    /**
     * @param array|object $category
     *
     * @return \Yandex\Market\Partner\Models\Categories
     */
    public function add($category)
    {
        if (is_array($category)) {
            $this->collection[] = new Category($category);
        } elseif (is_object($category) && $category instanceof Category) {
            $this->collection[] = $category;
        }
        return $this;
    }

    /**
     * Get items
     *
     * @return Category[]
     */
    public function getAll()
    {
        return $this->collection;
    }

    /**
     * @return Category
     */
    public function current()
    {
        return parent::current();
    }
}
