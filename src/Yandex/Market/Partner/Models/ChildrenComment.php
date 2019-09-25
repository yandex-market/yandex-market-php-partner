<?php

namespace Yandex\Market\Partner\Models;

use Yandex\Common\Model;

class ChildrenComment extends Model
{
    protected $id;
    protected $parentId;
    protected $createdAt;
    protected $updatedAt;
    protected $author;
    protected $body;
    protected $children;

    protected $mappingClasses = [
        'author' => Author::class,
        'children' => ChildrenComments::class,
    ];

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return int
     */
    public function getParentId()
    {
        return $this->parentId;
    }

    /**
     * @return string
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @return string
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * @return Author
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * @return string
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * @return ChildrenComments
     */
    public function getChildren()
    {
        return $this->children;
    }
}