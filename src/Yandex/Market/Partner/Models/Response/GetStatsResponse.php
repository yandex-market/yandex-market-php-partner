<?php

namespace Yandex\Market\Partner\Models\Response;

use Yandex\Common\Model;
use Yandex\Market\Partner\Models\Stats;

class GetStatsResponse extends Model
{
    public $mainStats;

    protected $mappingClasses = [
        'mainStats' => Stats::class,
    ];

    /**
     * @return Stats
     */
    public function getMainStats()
    {
        return $this->mainStats;
    }
}
