<?php

namespace Yandex\Market\Partner\Models;

use Yandex\Common\Model;

class AuthorRegion extends Model
{
    protected $id;
    protected $name;
    protected $type;

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
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }
}
