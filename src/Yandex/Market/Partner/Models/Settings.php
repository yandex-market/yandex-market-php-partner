<?php

namespace Yandex\Market\Partner\Models;

use Yandex\Common\Model;

class Settings extends Model
{
    protected $countryRegion;
    protected $isOnline;
    protected $shopName;
    protected $showInContext;
    protected $showInPremium;
    protected $showInSnippets;
    protected $useOpenStat;
    protected $localRegion;

    protected $mappingClasses = [
        'localRegion' => LocalRegion::class,
    ];

    /**
     * @return int
     */
    public function getCountryRegion()
    {
        return $this->countryRegion;
    }

    /**
     * @return bool
     */
    public function getisOnline()
    {
        return $this->isOnline;
    }

    /**
     * @return string
     */
    public function getShopName()
    {
        return $this->shopName;
    }

    /**
     * @return bool
     */
    public function getShowInContext()
    {
        return $this->showInContext;
    }

    /**
     * @return bool
     */
    public function getShowInPremium()
    {
        return $this->showInPremium;
    }

    /**
     * @return bool
     */
    public function getShowInSnippets()
    {
        return $this->showInSnippets;
    }

    /**
     * @return bool
     */
    public function getUseOpenStat()
    {
        return $this->useOpenStat;
    }

    /**
     * @return LocalRegion
     */
    public function getLocalRegion()
    {
        return $this->localRegion;
    }
}
