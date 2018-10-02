<?php

namespace Yandex\Market\Partner\Models\Common;

use Yandex\Common\Model;

class Pager extends Model
{
    protected $currentPage;
    protected $from;
    protected $pagesCount;
    protected $pageSize;
    protected $to;
    protected $total;

    /**
     * @return int
     */
    public function getCurrentPage()
    {
        return $this->currentPage;
    }

    /**
     * @return int
     */
    public function getFrom()
    {
        return $this->from;
    }

    /**
     * @return int
     */
    public function getPagesCount()
    {
        return $this->pagesCount;
    }

    /**
     * @return int
     */
    public function getPageSize()
    {
        return $this->pageSize;
    }

    /**
     * @return int
     */
    public function getTo()
    {
        return $this->to;
    }

    /**
     * @return int
     */
    public function getTotal()
    {
        return $this->total;
    }
}
