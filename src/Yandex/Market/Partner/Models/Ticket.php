<?php

namespace Yandex\Market\Partner\Models;

use Yandex\Common\Model;
use Yandex\Market\Partner\Data\DateType;

class Ticket extends Model
{
    const CHECK_METHOD_1 = 1;
    const CHECK_METHOD_2 = 2;
    const CHECK_METHOD_3 = 3;
    const CHECK_METHOD_4 = 4;

    const STATUS_ERROR_0 = 0;
    const STATUS_ERROR_1 = 1;

    protected $checkMethod;
    protected $errorCode;
    protected $errorFoundTime;
    protected $errorText;
    protected $feedTime;
    protected $offerURL;
    protected $orderId;
    protected $status;
    protected $ticketId;

    /**
     * @var DateType
     */
    private $dateType;

    public function __construct($data = [])
    {
        parent::__construct($data);
        $this->dateType = new DateType();
    }

    /**
     * @return int
     */
    public function getCheckMethod()
    {
        return $this->checkMethod;
    }

    /**
     * @return int
     */
    public function getErrorCode()
    {
        return $this->errorCode;
    }

    /**
     * @return string
     */
    public function getErrorFoundTime()
    {
        return $this->errorFoundTime;
    }

    /**
     * @return string
     */
    public function getErrorText()
    {
        return $this->errorText;
    }

    /**
     * @return string
     */
    public function getFeedTime()
    {
        return $this->feedTime;
    }

    /**
     * @return string
     */
    public function getOfferURL()
    {
        return $this->offerURL;
    }

    /**
     * @return string
     */
    public function getOrderId()
    {
        return $this->orderId;
    }

    /**
     * @return int
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @return int
     */
    public function getTicketId()
    {
        return $this->ticketId;
    }

    /**
     * @return \DateTimeImmutable|false
     */
    public function getFeedTimeTyped()
    {
        return $this->dateType->getDateTimeImmutable(DateType::FORMAT_USER, $this->getFeedTime());
    }

    /**
     * @return \DateTimeImmutable|false
     */
    public function getErrorFoundTimeTyped()
    {
        return $this->dateType->getDateTimeImmutable(DateType::FORMAT_USER, $this->getErrorFoundTime());
    }
}
