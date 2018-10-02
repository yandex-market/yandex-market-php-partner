<?php

namespace Yandex\Market\Partner\Models\Response;

use Yandex\Common\Model;
use Yandex\Market\Partner\Models\Categories;
use Yandex\Market\Partner\Models\Common\Pager;

class GetCampaignCategoriesResponse extends Model
{
    protected $categories;
    protected $pager;

    protected $mappingClasses = [
        'categories' => Categories::class,
        'pager' => Pager::class,
    ];

    /**
     * @return Categories
     */
    public function getCategories()
    {
        return $this->categories;
    }

    /**
     * @return Pager
     */
    public function getPager()
    {
        return $this->pager;
    }
}
