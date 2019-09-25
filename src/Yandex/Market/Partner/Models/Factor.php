<?php

namespace Yandex\Market\Partner\Models;

use Yandex\Common\Model;

class Factor extends Model
{
    protected $id;
    protected $title;
    protected $description;
    protected $value;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @return int
     */
    public function getValue()
    {
        return $this->value;
    }
}