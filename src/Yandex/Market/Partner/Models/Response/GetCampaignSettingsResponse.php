<?php

namespace Yandex\Market\Partner\Models\Response;

use Yandex\Common\Model;
use Yandex\Market\Partner\Models\Settings;

class GetCampaignSettingsResponse extends Model
{
    protected $settings;

    protected $mappingClasses = [
        'settings' => Settings::class,
    ];

    /**
     * @return Settings
     */
    public function getSettings()
    {
        return $this->settings;
    }
}
