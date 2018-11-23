<?php
/**
 * Created by PhpStorm.
 * User: klitvinov
 * Date: 23.11.18
 * Time: 10:22
 */

namespace Yandex\Market\Partner\Models\Response;


use Yandex\Common\Model;
use Yandex\Market\Partner\Models\HiddenOffers;

class HiddenOffersResponse extends Model
{
    protected $status;
    protected $total;
    protected $paging;
    protected $hiddenOffers;

    protected $mappingClasses = [
        'hiddenOffers' => HiddenOffers::class
    ];

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @return mixed
     */
    public function getTotal()
    {
        return $this->total['nextPageToken'];
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
     * @return HiddenOffers
     */
    public function getHiddenOffers()
    {
        return $this->hiddenOffers;
    }
}
