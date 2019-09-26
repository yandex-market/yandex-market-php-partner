<?php

namespace Yandex\Market\Partner\Models;

use Yandex\Common\Model;

class Feedback extends Model
{
    protected $id;
    protected $createdAt;
    protected $state;
    protected $recommend;
    protected $verified;
    protected $resolved;
    protected $author;
    protected $shop;
    protected $grades;
    protected $pro;
    protected $contra;
    protected $text;
    protected $order;
    protected $comments;

    protected $mappingClasses = [
        'author' => Author::class,
        'shop' => Shop::class,
        'grades' => Grades::class,
        'order' => Order::class,
        'comments' => Comments::class,
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
    public function getState()
    {
        return $this->state;
    }

    /**
     * @return bool
     */
    public function getRecommend()
    {
        return $this->recommend;
    }

    /**
     * @return bool
     */
    public function getVerified()
    {
        return $this->verified;
    }

    /**
     * @return bool
     */
    public function getResolved()
    {
        return $this->resolved;
    }

    /**
     * @return Author
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * @return Shop
     */
    public function getShop()
    {
        return $this->shop;
    }

    /**
     * @return Grades
     */
    public function getGrades()
    {
        return $this->grades;
    }

    /**
     * @return string
     */
    public function getPro()
    {
        return $this->pro;
    }

    /**
     * @return string
     */
    public function getContra()
    {
        return $this->contra;
    }

    /**
     * @return string
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * @return Order|null
     */
    public function getOrder()
    {
        return $this->order;
    }

    /**
     * @return Comments
     */
    public function getComments()
    {
        return $this->comments;
    }
}