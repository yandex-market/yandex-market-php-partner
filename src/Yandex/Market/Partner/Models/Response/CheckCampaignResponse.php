<?php

namespace Yandex\Market\Partner\Models\Response;

use Yandex\Common\Model;
use Yandex\Market\Partner\Data\DateType;

class CheckCampaignResponse extends Model
{
    protected $estimatedEndTime;
    protected $message;
    protected $hasErrors = false;

    /**
     * @var DateType
     */
    private $dateType;

    public function __construct(array $data = [])
    {
        $this->dateType = new DateType();
        if(isset($data['result'])) {
            parent::__construct($data['result']);
        } else {
            $this->hasErrors = true;
        }
    }

    /**
     * @return string|null
     */
    public function getEstimatedEndTime()
    {
        return $this->estimatedEndTime;
    }

    /**
     * @return string|null
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @return \DateTimeImmutable|false
     */
    public function getEstimatedEndTimeTyped()
    {
        return $this->dateType->getDateTimeImmutable(DateType::FORMAT_USER, $this->getEstimatedEndTime());
    }

    /**
     * @return bool
     */
    public function hasErrors()
    {
        return $this->hasErrors;
    }
}
