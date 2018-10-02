<?php

namespace Yandex\Market\Partner\Models\Response;

use Yandex\Common\Model;

class CheckCampaignResponse extends Model
{
    protected $estimatedEndTime;
    protected $message;

    public function __construct(array $data = [])
    {
        parent::__construct($data['result']);
    }

    /**
     * @return mixed
     */
    public function getEstimatedEndTime()
    {
        return $this->estimatedEndTime;
    }

    /**
     * @return mixed
     */
    public function getMessage()
    {
        return $this->message;
    }
}
