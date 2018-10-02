<?php

namespace Yandex\Market\Partner\Models;

use Yandex\Common\Model;

class Report extends Model
{
    protected $actualErrorCount;
    protected $ageBonus;
    protected $archiveErrorCount;
    protected $checkCount;
    protected $cloneCount;
    protected $errorCount;
    protected $gradeCount;
    protected $marketRating;
    protected $modificationTime;
    protected $opinionCount;
    protected $opinionUrl;
    protected $qualityBonus;
    protected $qualityServiceRating;

    /**
     * @return int
     */
    public function getActualErrorCount()
    {
        return $this->actualErrorCount;
    }

    /**
     * @return float
     */
    public function getAgeBonus()
    {
        return $this->ageBonus;
    }

    /**
     * @return int
     */
    public function getArchiveErrorCount()
    {
        return $this->archiveErrorCount;
    }

    /**
     * @return int
     */
    public function getCheckCount()
    {
        return $this->checkCount;
    }

    /**
     * @return int
     */
    public function getCloneCount()
    {
        return $this->cloneCount;
    }

    /**
     * @return int
     */
    public function getErrorCount()
    {
        return $this->errorCount;
    }

    /**
     * @return int
     */
    public function getGradeCount()
    {
        return $this->gradeCount;
    }

    /**
     * @return float
     */
    public function getMarketRating()
    {
        return $this->marketRating;
    }

    /**
     * @return string
     */
    public function getModificationTime()
    {
        return $this->modificationTime;
    }

    /**
     * @return int
     */
    public function getOpinionCount()
    {
        return $this->opinionCount;
    }

    /**
     * @return string
     */
    public function getOpinionUrl()
    {
        return $this->opinionUrl;
    }

    /**
     * @return float
     */
    public function getQualityBonus()
    {
        return $this->qualityBonus;
    }

    /**
     * @return float
     */
    public function getQualityServiceRating()
    {
        return $this->qualityServiceRating;
    }
}
