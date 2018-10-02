<?php

namespace Yandex\Market\Partner\Models\Response;

use Yandex\Common\Model;
use Yandex\Market\Partner\Models\BidsSettings;

class BidsSettingsResponse extends Model
{
    protected $settings;

    protected $mappingClasses = [
        'settings' => BidsSettings::class,
    ];

    /**
     * @return BidsSettings
     */
    public function getSettings()
    {
        return $this->settings;
    }
}
