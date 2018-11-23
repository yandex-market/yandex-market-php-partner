<?php

namespace Yandex\Market\Partner\Models;

use Yandex\Common\Model;

class HiddenOffer extends Model
{
    protected $comment;
    protected $feedId;
    protected $offerId;
    protected $ttlInHours;

    /**
     * @return mixed
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * @return mixed
     */
    public function getFeedId()
    {
        return $this->feedId;
    }

    /**
     * @return mixed
     */
    public function getOfferId()
    {
        return $this->offerId;
    }

    /**
     * @return mixed
     */
    public function getTtlInHours()
    {
        return $this->ttlInHours;
    }
}
