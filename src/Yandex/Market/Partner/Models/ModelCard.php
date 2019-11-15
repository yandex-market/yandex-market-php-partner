<?php

namespace Yandex\Market\Partner\Models;

use Yandex\Common\Model;

class ModelCard extends Model
{
    protected $currentPosAll;
    protected $currentPosTop;
    protected $error;
    protected $topOffersCount;
    protected $posRecommendations;

    /**
     * @return int
     */
    public function getCurrentPosAll()
    {
        return $this->currentPosAll;
    }

    /**
     * @return int
     */
    public function getCurrentPosTop()
    {
        return $this->currentPosTop;
    }

    /**
     * @return string
     */
    public function getError()
    {
        return $this->error;
    }

    /**
     * @return int
     */
    public function getTopOffersCount()
    {
        return $this->topOffersCount;
    }

    /**
     * @return array|null
     */
    public function getPosRecommendations()
    {
        return $this->posRecommendations;
    }
}
