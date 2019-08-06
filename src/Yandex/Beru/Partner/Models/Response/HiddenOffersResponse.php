<?php

namespace Yandex\Beru\Partner\Models\Response;

use Yandex\Common\Model;
use Yandex\Beru\Partner\Models\HiddenOffers;

class HiddenOffersResponse extends Model
{
    protected $total;
    protected $paging;
    protected $hiddenOffers;

    protected $mappingClasses = [
        'hiddenOffers' => HiddenOffers::class
    ];

    /**
     * @return mixed
     */
    public function getTotal()
    {
        return $this->total;
    }

    /**
     * @return mixed
     */
    public function getNextPageToken()
    {
        if (isset($this->paging['nextPageToken'])) {
            return $this->paging['nextPageToken'];
        }
        return null;
    }

    /**
     * @return mixed
     */
    public function getHiddenOffers()
    {
        return $this->hiddenOffers;
    }
}
