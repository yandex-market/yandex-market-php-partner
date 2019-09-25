<?php

namespace Yandex\Market\Partner\Models;

use Yandex\Common\Model;

class Grades extends Model
{
    protected $average;
    protected $agreeCount;
    protected $rejectCount;
    protected $factors;

    protected $mappingClasses = [
        'factors' => Factors::class,
    ];

    /**
     * @return int
     */
    public function getAverage()
    {
        return $this->average;
    }

    /**
     * @return int
     */
    public function getAgreeCount()
    {
        return $this->agreeCount;
    }

    /**
     * @return int
     */
    public function getRejectCount()
    {
        return $this->rejectCount;
    }

    /**
     * @return Factors
     */
    public function getFactors()
    {
        return $this->factors;
    }
}