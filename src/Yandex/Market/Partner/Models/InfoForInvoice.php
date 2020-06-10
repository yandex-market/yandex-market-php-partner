<?php

namespace Yandex\Market\Partner\Models;

use Yandex\Common\Model;

class InfoForInvoice extends Model
{
    protected $url;
    protected $requestId;
    protected $parentPerson;
    protected $pcps;

    protected $mappingClasses = [
        'pcps' => Pcps::class,
        'parentPerson' => ParentPerson::class,
    ];

    /**
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @return int
     */
    public function getRequestId()
    {
        return $this->requestId;
    }

    /**
     * @return ParentPerson|null
     */
    public function getParentPerson()
    {
        return $this->parentPerson;
    }

    /**
     * @return Pcps|null
     */
    public function getPcps()
    {
        return $this->pcps;
    }
}
