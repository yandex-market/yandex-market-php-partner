<?php

namespace Yandex\Market\Partner\Models;

use Yandex\Common\Model;

class Campaign extends Model
{
    protected $domain;
    protected $id;
    protected $state;
    protected $stateReasons;

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
     * @return array
     */
    public function getStateReasons()
    {
        return $this->stateReasons;
    }
}
