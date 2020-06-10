<?php

namespace Yandex\Market\Partner\Models;

use Yandex\Common\Model;

class Campaign extends Model
{
    const CAMPAIGN_STATE_1 = 1;
    const CAMPAIGN_STATE_2 = 2;
    const CAMPAIGN_STATE_3 = 3;
    const CAMPAIGN_STATE_4 = 4;

    const STATE_REASON_5 = 5;
    const STATE_REASON_6 = 6;
    const STATE_REASON_7 = 7;
    const STATE_REASON_9 = 9;
    const STATE_REASON_11 = 11;
    const STATE_REASON_12 = 12;
    const STATE_REASON_13 = 13;
    const STATE_REASON_15 = 15;
    const STATE_REASON_16 = 16;
    const STATE_REASON_20 = 20;
    const STATE_REASON_21 = 21;
    const STATE_REASON_24 = 24;
    const STATE_REASON_25 = 25;
    const STATE_REASON_26 = 26;
    const STATE_REASON_27 = 27;
    const STATE_REASON_28 = 28;
    const STATE_REASON_29= 29;

    protected $domain;
    protected $id;
    protected $state;
    protected $stateReasons;
    protected $clientId;

    /**
     * @return string
     */
    public function getDomain()
    {
        return $this->domain;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return int
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * @return array|null
     */
    public function getStateReasons()
    {
        return $this->stateReasons;
    }

    /**
     * @return int
     */
    public function getClientId()
    {
        return $this->clientId;
    }
}
