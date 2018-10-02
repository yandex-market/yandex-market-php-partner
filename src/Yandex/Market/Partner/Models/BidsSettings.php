<?php

namespace Yandex\Market\Partner\Models;

use Yandex\Common\Model;

class BidsSettings extends Model
{
    protected $autobrokerEnabled;
    protected $bidsFrom;
    protected $offerIdBy;

    protected $bookBids;
    protected $shopBids;

    protected $mappingClasses = [
        'bookBids' => Bid::class,
        'shopBids' => Bid::class,
    ];

    /**
     * @return bool
     */
    public function getAutobrokerEnabled()
    {
        return $this->autobrokerEnabled;
    }

    /**
     * @return string
     */
    public function getBidsFrom()
    {
        return $this->bidsFrom;
    }

    /**
     * @return string
     */
    public function getOfferIdBy()
    {
        return $this->offerIdBy;
    }

    /**
     * @return Bid
     */
    public function getBookBids()
    {
        return $this->bookBids;
    }

    /**
     * @return Bid
     */
    public function getShopBids()
    {
        return $this->shopBids;
    }
}
