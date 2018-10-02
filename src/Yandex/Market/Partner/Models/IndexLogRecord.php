<?php

namespace Yandex\Market\Partner\Models;

use Yandex\Common\Model;

class IndexLogRecord extends Model
{
    public $downloadTime;
    public $fileTime;
    public $generationId;
    public $indexType;
    public $publishedTime;
    public $status;
    public $error;
    public $offers;

    protected $mappingClasses = [
        'offers' => IndexLogOffer::class,
        'error' => ItemError::class,
    ];

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
     * @return ItemError
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
}
