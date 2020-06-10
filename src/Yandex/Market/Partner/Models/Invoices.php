<?php

namespace Yandex\Market\Partner\Models;

use Yandex\Common\ObjectModel;

class Invoices extends ObjectModel
{
    public function __construct($data = [])
    {
        parent::__construct($data['invoices']);
    }

    /**
     * @param array|object $invoice
     *
     * @return Invoices
     */
    public function add($invoice)
    {
        if (is_array($invoice)) {
            $this->collection[] = new Invoice($invoice);
        } elseif (is_object($invoice) && $invoice instanceof Invoice) {
            $this->collection[] = $invoice;
        }
        return $this;
    }

    /**
     * Get items
     *
     * @return Invoice[]
     */
    public function getAll()
    {
        return $this->collection;
    }

    /**
     * @return Invoice
     */
    public function current()
    {
        return parent::current();
    }
}
