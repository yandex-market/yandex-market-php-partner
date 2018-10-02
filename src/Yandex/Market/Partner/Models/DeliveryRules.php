<?php

namespace Yandex\Market\Partner\Models;

use Yandex\Common\ObjectModel;

class DeliveryRules extends ObjectModel
{
    /**
     * @param array|object $rule
     *
     * @return DeliveryRules
     */
    public function add($rule)
    {
        if (is_array($rule)) {
            $this->collection[] = new DeliveryRule($rule);
        } elseif (is_object($rule) && $rule instanceof DeliveryRule) {
            $this->collection[] = $rule;
        }
        return $this;
    }

    /**
     * Get items
     *
     * @return DeliveryRule[]
     */
    public function getAll()
    {
        return $this->collection;
    }

    /**
     * @return DeliveryRule
     */
    public function current()
    {
        return parent::current();
    }
}
