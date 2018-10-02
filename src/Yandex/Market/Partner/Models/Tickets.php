<?php

namespace Yandex\Market\Partner\Models;

use Yandex\Common\ObjectModel;

class Tickets extends ObjectModel
{
    /**
     * @param array|object $ticket
     *
     * @return Tickets
     */
    public function add($ticket)
    {
        if (is_array($ticket)) {
            $this->collection[] = new Ticket($ticket);
        } elseif (is_object($ticket) && $ticket instanceof Ticket) {
            $this->collection[] = $ticket;
        }
        return $this;
    }

    /**
     * Get items
     *
     * @return Ticket[]
     */
    public function getAll()
    {
        return $this->collection;
    }

    /**
     * @return Ticket
     */
    public function current()
    {
        return parent::current();
    }
}
