<?php

namespace Yandex\Market\Partner\Models\Response;

use Yandex\Common\Model;
use Yandex\Market\Partner\Models\Region;

class GetRegionResponse extends Model
{
    protected $region;

    protected $mappingClasses = [
        'region' => Region::class,
    ];

    protected $propNameMap = [
        'regions' => 'region'
    ];

    /**
     * @return Region
     */
    public function getRegion()
    {
        return $this->region;
    }
}
