<?php

namespace Yandex\Beru\Partner\Models;

use Yandex\Common\ObjectModel;

class Document extends ObjectModel
{
    protected $id;
    protected $createdAt;
    protected $type;

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }
}
