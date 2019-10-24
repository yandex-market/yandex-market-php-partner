<?php

namespace Yandex\Market\Partner\Models;

use Yandex\Common\Model;
use Yandex\Market\Partner\Data\DateType;

class IndexLogRecord extends Model
{
    const INDEX_TYPE_DIFF = 'DIFF';
    const INDEX_TYPE_FAST_PRICE = 'FAST_PRICE';
    const INDEX_TYPE_FULL = 'FULL';

    const STATUS_ERROR = 'ERROR';
    const STATUS_WARNING = 'WARNING';
    const STATUS_OK = 'OK';

    public $downloadTime;
    public $fileTime;
    public $generationId;
    public $indexType;
    public $publishedTime;
    public $status;
    public $error;
    public $offers;

    /**
     * @var DateType
     */
    private $dateType;

    protected $mappingClasses = [
        'offers' => IndexLogOffer::class,
        'error' => ItemError::class,
    ];

    public function __construct($data = [])
    {
        parent::__construct($data);
        $this->dateType = new DateType();
    }

    /**
     * @return String
     */
    public function getDownloadTime()
    {
        return $this->downloadTime;
    }

    /**
     * @return String
     */
    public function getFileTime()
    {
        return $this->fileTime;
    }

    /**
     * @return Integer
     */
    public function getGenerationId()
    {
        return $this->generationId;
    }

    /**
     * @return String
     */
    public function getIndexType()
    {
        return $this->indexType;
    }

    /**
     * @return String
     */
    public function getPublishedTime()
    {
        return $this->publishedTime;
    }

    /**
     * @return String
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @return ItemError|null
     */
    public function getError()
    {
        return $this->error;
    }

    /**
     * @return IndexLogOffer
     */
    public function getOffers()
    {
        return $this->offers;
    }

    /**
     * @return \DateTimeImmutable|false
     */
    public function getDownloadTimeTyped()
    {
        return $this->dateType->getDateTimeImmutable(DateType::FORMAT_USER, $this->getDownloadTime());
    }

    /**
     * @return \DateTimeImmutable|false
     */
    public function getFileTimeTyped()
    {
        return $this->dateType->getDateTimeImmutable(DateType::FORMAT_USER, $this->getFileTime());
    }

    /**
     * @return \DateTimeImmutable|false
     */
    public function getPublishedTimeTyped()
    {
        return $this->dateType->getDateTimeImmutable(DateType::FORMAT_USER, $this->getPublishedTime());
    }
}
