<?php

namespace Yandex\Market\Partner\Models;

use Yandex\Common\Model;

class Author extends Model
{
    protected $name;
    protected $region;
    protected $type;

    protected $mappingClasses = [
        'region' => AuthorRegion::class,
    ];

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return AuthorRegion|null
     */
    public function getRegion()
    {
        return $this->region;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }
}
