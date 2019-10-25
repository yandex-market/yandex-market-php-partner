<?php

namespace Yandex\Market\Partner\Models;

use Yandex\Common\Model;
use Yandex\Market\Partner\Data\DateType;

class Feed extends Model
{
    protected $expireDate;
    protected $id;
    protected $login;
    protected $name;
    protected $password;
    protected $uploadDate;
    protected $url;
    protected $content;
    protected $download;
    protected $placement;
    protected $publication;

    /**
     * @var DateType
     */
    private $dateType;

    protected $mappingClasses = [
        'content' => Content::class,
        'download' => Download::class,
        'placement' => Placement::class,
        'publication' => Publication::class,
    ];

    public function __construct($data = [])
    {
        parent::__construct($data);
        $this->dateType = new DateType();
    }
    /**
     * @return String
     */
    public function getExpireDate()
    {
        return $this->expireDate;
    }

    /**
     * @return Integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return String
     */
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * @return String
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return String
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @return String
     */
    public function getUploadDate()
    {
        return $this->uploadDate;
    }

    /**
     * @return String
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @return Content
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @return Download
     */
    public function getDownload()
    {
        return $this->download;
    }

    /**
     * @return Placement
     */
    public function getPlacement()
    {
        return $this->placement;
    }

    /**
     * @return Publication
     */
    public function getPublication()
    {
        return $this->publication;
    }

    /**
     * @return \DateTimeImmutable|false
     */
    public function getUploadDateTyped()
    {
        return $this->dateType->getDateTimeImmutable(DateType::FORMAT_PUBLIC, $this->getUploadDate());
    }
}
