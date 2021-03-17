<?php

namespace Yandex\Market\Partner\Models;

use Yandex\Common\Model;

class Region extends Model
{
    const TYPE_AREA = "AREA";
    const TYPE_CITY = "CITY";
    const TYPE_CONTINENT = "CONTINENT";
    const TYPE_COUNTRY = "COUNTRY";
    const TYPE_DISCTRICT = "DISCTRICT";
    const TYPE_MONORAIL_STATION = "MONORAIL_STATION";
    const TYPE_OVERSEAS_TERRITORY = "OVERSEAS_TERRITORY";
    const TYPE_REGION = "REGION";
    const TYPE_REPUBLIC = "REPUBLIC";
    const TYPE_REPUBLIC_AREA = "REPUBLIC_AREA";
    const TYPE_SECONDARY_DISTRICT = "SECONDARY_DISTRICT";
    const TYPE_SETTLEMENT = "SETTLEMENT";
    const TYPE_SUBURB = "SUBURB";
    const TYPE_SUBWAY_STATION = "SUBWAY_STATION";
    const TYPE_TOWN = "TOWN";
    const TYPE_UNKNOWN = "UNKNOWN";

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
