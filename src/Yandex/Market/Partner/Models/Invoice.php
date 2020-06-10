<?php

namespace Yandex\Market\Partner\Models;

use DateTimeImmutable;
use Yandex\Common\Model;
use Yandex\Market\Partner\Data\DateType;

class Invoice extends Model
{
    protected $invoiceId;
    protected $externalId;
    protected $date;
    protected $currency;
    protected $totalSum;

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
    public function getInvoiceId()
    {
        return $this->invoiceId;
    }

    /**
     * @return string
     */
    public function getExternalId()
    {
        return $this->externalId;
    }

    /**
     * @return string
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @return string
     */
    public function getCurrency()
    {
        return $this->currency;
    }

    /**
     * @return double
     */
    public function getTotalSum()
    {
        return $this->totalSum;
    }

    /**
     * @return DateTimeImmutable|false
     */
    public function getDateTyped()
    {
        return $this->dateType->getDateTimeImmutable(DateType::FORMAT_USER, $this->getDate());
    }
}
