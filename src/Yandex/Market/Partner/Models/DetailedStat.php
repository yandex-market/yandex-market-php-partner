<?php

namespace Yandex\Market\Partner\Models;

use Yandex\Common\Model;

class DetailedStat extends Model
{
    protected $clicks;
    protected $shows;
    protected $spending;
    protected $type;

    /**
     * @return int
     */
    public function getClicks()
    {
        return $this->clicks;
    }

    /**
     * @return int
     */
    public function getShows()
    {
        return $this->shows;
    }

    /**
     * @return double
     */
    public function getSpending()
    {
        return $this->spending;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }
}
