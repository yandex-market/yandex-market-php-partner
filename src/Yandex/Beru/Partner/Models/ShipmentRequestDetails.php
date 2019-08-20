<?php

namespace Yandex\Beru\Partner\Models;

use Yandex\Common\Model;

class ShipmentRequestDetails extends Model
{
    protected $id;
    protected $type;
    protected $status;
    protected $requestedDate;
    protected $updatedAt;
    protected $itemsTotalCount;
    protected $hasShortage;
    protected $itemsTotalFactCount;
    protected $hasDefects;
    protected $itemsTotalDefectCount;
    protected $comment;
    protected $documents;
    protected $statusHistory;
    protected $errors;

    protected $mappingClasses = [
        'documents' => Documents::class,
        'statusHistory' => StatusHistory::class,
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
    public function getType()
    {
        return $this->type;
    }

    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @return string
     */
    public function getRequestedDate()
    {
        return $this->requestedDate;
    }

    /**
     * @return string
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * @return int
     */
    public function getItemsTotalCount()
    {
        return $this->itemsTotalCount;
    }

    /**
     * @return bool
     */
    public function getHasShortage()
    {
        return $this->hasShortage;
    }

    /**
     * @return int
     */
    public function getItemsTotalFactCount()
    {
        return $this->itemsTotalFactCount;
    }

    /**
     * @return bool
     */
    public function getHasDefects()
    {
        return $this->hasDefects;
    }

    /**
     * @return int
     */
    public function getItemsTotalDefectCount()
    {
        return $this->itemsTotalDefectCount;
    }

    /**
     * @return string
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * @return Documents
     */
    public function getDocuments()
    {
        return $this->documents;
    }

    /**
     * @return StatusHistoryRow
     */
    public function getStatusHistory()
    {
        return $this->statusHistory;
    }

    /**
     * @return array
     */
    public function getErrors()
    {
        return $this->errors;
    }
}
