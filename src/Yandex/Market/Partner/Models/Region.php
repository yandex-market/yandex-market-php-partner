<?php

namespace Yandex\Market\Partner\Models;

use Yandex\Common\Model;

class Region extends Model
{
    protected $id;
    protected $name;
    protected $type;
    protected $children;
    protected $parent;

    protected $mappingClasses = [
        'parent' => Region::class,
        'children' => Regions::class,
    ];

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

    /**
     * @return Region
     */
    public function getParent()
    {
        return $this->parent;
    }

    /**
     * @return Regions
     */
    public function getChildren()
    {
        return $this->children;
    }
}
