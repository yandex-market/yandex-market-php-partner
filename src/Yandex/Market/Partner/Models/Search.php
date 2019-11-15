<?php

namespace Yandex\Market\Partner\Models;

use Yandex\Common\Model;

class Search extends Model
{
    protected $error;
    protected $posRecommendations;

    protected $mappingClasses = [
        'posRecommendations' => PosRecommendations::class,
    ];
    /**
     * @return array
     */
    public function getError()
    {
        return $this->error;
    }

    /**
     * @return PosRecommendations|null
     */
    public function getPosRecommendations()
    {
        return $this->posRecommendations;
    }
}