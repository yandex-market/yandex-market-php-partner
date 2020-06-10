<?php

namespace Yandex\Market\Partner\Models;

use Yandex\Common\Model;

class ParentPerson extends Model
{
    protected $clientId;
    protected $name;
    protected $isAgency;
    protected $agencyId;

    /**
     * @return int
     */
    public function geClientId()
    {
        return $this->clientId;
    }

    /**
     * @return string
     */
    public function geName()
    {
        return $this->name;
    }

    /**
     * @return bool
     */
    public function getIsAgency()
    {
        return $this->isAgency;
    }

    /**
     * @return int
     */
    public function getAgencyId()
    {
        return $this->agencyId;
    }
}
