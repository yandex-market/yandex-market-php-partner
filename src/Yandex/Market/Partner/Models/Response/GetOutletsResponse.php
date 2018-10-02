<?php

namespace Yandex\Market\Partner\Models\Response;

use Yandex\Common\Model;
use Yandex\Market\Partner\Models\Common\Pager;
use Yandex\Market\Partner\Models\Outlets;

class GetOutletsResponse extends Model
{
    protected $outlets;
    protected $pager;

    protected $mappingClasses = [
        'outlets' => Outlets::class,
        'pager' => Pager::class
    ];

    /**
     * @return Outlets
     */
    public function getOutlets()
    {
        return $this->outlets;
    }

    public function getPager()
    {
        return $this->pager;
    }
}
