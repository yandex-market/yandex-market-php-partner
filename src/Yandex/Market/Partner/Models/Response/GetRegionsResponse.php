<?php

namespace Yandex\Market\Partner\Models\Response;

use Yandex\Common\Model;
use Yandex\Market\Partner\Models\Common\Pager;
use Yandex\Market\Partner\Models\Regions;

class GetRegionsResponse extends Model
{
    protected $regions;
    protected $pager;

    protected $mappingClasses = [
        'regions' => Regions::class,
        'pager' => Pager::class
    ];

    /**
     * @return Pager
     */
    public function getPager()
    {
        return $this->pager;
    }

    /**
     * @return Regions
     */
    public function getRegions()
    {
        return $this->regions;
    }
}
