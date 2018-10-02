<?php

namespace Yandex\Market\Partner\Models;

use Yandex\Common\ObjectModel;

/**
 * Class Campaigns
 *
 * @package Yandex\Market\Partner\Models\Campaign
 */
class Feeds extends ObjectModel
{
    /**
     * @param array|object $feed
     *
     * @return Feeds
     */
    public function add($feed)
    {
        if (is_array($feed)) {
            $this->collection[] = new Feed($feed);
        } elseif (is_object($feed) && $feed instanceof Feed) {
            $this->collection[] = $feed;
        }
        return $this;
    }

    /**
     * Get items
     *
     * @return Feed[]
     */
    public function getAll()
    {
        return $this->collection;
    }

    /**
     * @return Feed
     */
    public function current()
    {
        return parent::current();
    }
}
