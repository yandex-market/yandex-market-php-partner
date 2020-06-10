<?php

namespace Yandex\Market\Partner\Models;

use Yandex\Common\Model;

class Contract extends Model
{
    protected $contractId;
    protected $externalId;

    /**
     * @return int
     */
    public function getContractId()
    {
        return $this->contractId;
    }

    /**
     * @return string
     */
    public function getExternalId()
    {
        return $this->externalId;
    }
}
