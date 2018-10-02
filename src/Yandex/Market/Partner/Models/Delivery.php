<?php

namespace Yandex\Market\Partner\Models;

use Yandex\Common\Model;

class Delivery extends Model
{
    protected $availableOnHolidays;
    protected $source;
    protected $customHolidays;
    protected $customWorkingDays;
    protected $period;
    protected $totalHolidays;
    protected $weeklyHolidays;

    protected $mappingClasses = [
        'period' => Period::class,
    ];

    /**
     * Delivery property has only 1 key - schedule
     *
     * @param array $data
     */
    public function __construct(array $data)
    {
        parent::__construct($data['schedule']);
    }

    /**
     * @return bool
     */
    public function getAvailableOnHolidays()
    {
        return $this->availableOnHolidays;
    }

    /**
     * @return string
     */
    public function getSource()
    {
        return $this->source;
    }

    /**
     * @return array
     */
    public function getCustomHolidays()
    {
        return $this->customHolidays;
    }

    /**
     * @return array
     */
    public function getCustomWorkingDays()
    {
        return $this->customWorkingDays;
    }

    /**
     * @return Period
     */
    public function getPeriod()
    {
        return $this->period;
    }

    /**
     * @return array
     */
    public function getTotalHolidays()
    {
        return $this->totalHolidays;
    }

    /**
     * @return array
     */
    public function getWeeklyHolidays()
    {
        return $this->weeklyHolidays;
    }
}
