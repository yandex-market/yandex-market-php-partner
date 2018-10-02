<?php

namespace Yandex\Market\Partner\Models\Common;

use Yandex\Common\ObjectModel;

/**
 * Class Campaigns
 *
 * @package Yandex\Market\Partner\Models\Campaign
 */
class Errors extends ObjectModel
{
    /**
     * @param array|object $error
     *
     * @return Errors
     */
    public function add($error)
    {
        if (is_array($error)) {
            $this->collection[] = new Error($error);
        } elseif (is_object($error) && $error instanceof Error) {
            $this->collection[] = $error;
        }
        return $this;
    }

    /**
     * Get items
     *
     * @return Error[]
     */
    public function getAll()
    {
        return $this->collection;
    }

    /**
     * @return Error
     */
    public function current()
    {
        return parent::current();
    }
}
