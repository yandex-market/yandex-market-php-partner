<?php

namespace Yandex\Market\Partner\Models;

use Yandex\Common\ObjectModel;

/**
 * Class Campaigns
 *
 * @package Yandex\Market\Partner\Models\Campaign
 */
class Campaigns extends ObjectModel
{
    /**
     * @param array|object $campaign
     *
     * @return Campaigns
     */
    public function add($campaign)
    {
        if (is_array($campaign)) {
            $this->collection[] = new Campaign($campaign);
        } elseif (is_object($campaign) && $campaign instanceof Campaign) {
            $this->collection[] = $campaign;
        }
        return $this;
    }

    /**
     * Get items
     *
     * @return Campaign[]
     */
    public function getAll()
    {
        return $this->collection;
    }

    /**
     * @return Campaign
     */
    public function current()
    {
        return parent::current();
    }
}
