<?php

namespace Yandex\Market\Partner\Models;

use Yandex\Common\Model;

class Category extends Model
{
    protected $feedId;
    protected $id;
    protected $name;
    protected $parentId;

    /**
     * @return int
     */
    public function getFeedId()
    {
        return $this->feedId;
    }

    /**
     * @return string
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
     * @return int|null
     */
    public function getParentId()
    {
        return $this->parentId;
    }
}
