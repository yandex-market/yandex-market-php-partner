<?php

namespace Yandex\Market\Partner\Models;

use Yandex\Common\Model;

class Ticket extends Model
{
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
}
