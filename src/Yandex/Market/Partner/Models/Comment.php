<?php

namespace Yandex\Market\Partner\Models;

use Yandex\Common\Model;

class Comment extends Model
{
    protected $id;
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
     * @return ChildrenComments|null
     */
    public function getChildren()
    {
        return $this->children;
    }
}