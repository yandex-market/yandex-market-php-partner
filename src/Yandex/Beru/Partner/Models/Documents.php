<?php

namespace Yandex\Beru\Partner\Models;

use Yandex\Common\ObjectModel;

class Documents extends ObjectModel
{
    /**
     * @param array|object $document
     *
     * @return Documents
     */
    public function add($document)
    {
        if (is_array($document)) {
            $this->collection[] = new Document($document);
        } elseif (is_object($document) && $document instanceof Document) {
            $this->collection[] = $document;
        }
        return $this;
    }

    /**
     * Get items
     *
     * @return Document[]
     */
    public function getAll()
    {
        return $this->collection;
    }

    /**
     * @return Document
     */
    public function current()
    {
        return parent::current();
    }
}
