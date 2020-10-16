<?php
/* @copyright © ООО Яндекс.Маркет (Yandex.Market LLC), 2018 */

namespace Yandex\Market\Partner\Clients;

use Yandex\Market\Partner\Models\Campaign;
use Yandex\Market\Partner\Models\Campaigns;
use Yandex\Market\Partner\Models\Response\GetCampaignResponse;
use Yandex\Market\Partner\Models\Response\GetCampaignSettingsResponse;
use Yandex\Market\Partner\Models\Response\GetCampaignsResponse;
use Yandex\Market\Partner\Models\Settings;

class BaseClient extends Client
{
    /**
     * Get User Campaigns
     *
     * Returns the user to the list of campaigns Yandex.market.
     * The list coincides with the list of campaigns
     * that are displayed in the partner interface Yandex.Market on page "My shops."
     *
     * @see https://tech.yandex.ru/market/partner/doc/dg/reference/get-campaigns-docpage/
     *
     * @param array $params
     * @param null $dbgKey
     * @return GetCampaignsResponse
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Yandex\Common\Exception\ForbiddenException
     * @throws \Yandex\Common\Exception\UnauthorizedException
     * @throws \Yandex\Market\Partner\Exception\PartnerRequestException
     */
    public function getCampaigns(array $params = [], $dbgKey = null)
    {
        $resource = 'campaigns.json';
        $resource .= '?' . $this->buildQueryString($params, $dbgKey);

        $response = $this->sendRequest('GET', $this->getServiceUrl($resource));

        $decodedResponseBody = $this->getDecodedBody($response->getBody());

        return new GetCampaignsResponse($decodedResponseBody);
    }

    /**
     * Get User Campaign
     *
     * Returns user campaign from Yandex.market.
     *
     * @see https://tech.yandex.ru/market/partner/doc/dg/reference/get-campaigns-id-docpage/
     *
     * @param $campaignId
     * @param array $params
     * @param null $dbgKey
     * @return Campaign
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Yandex\Common\Exception\ForbiddenException
     * @throws \Yandex\Common\Exception\UnauthorizedException
     * @throws \Yandex\Market\Partner\Exception\PartnerRequestException
     */
    public function getCampaign($campaignId, array $params = [], $dbgKey = null)
    {
        $resource = 'campaigns/' . $campaignId . '.json';
        $resource .= '?' . $this->buildQueryString($params, $dbgKey);

        $response = $this->sendRequest('GET', $this->getServiceUrl($resource));

        $decodedResponseBody = $this->getDecodedBody($response->getBody());

        $getCampaignsResponse = new GetCampaignResponse($decodedResponseBody);
        return $getCampaignsResponse->getCampaign();
    }

    /**
     * Get Campaign Logins
     *
     * Returns campaign logins.
     *
     * @see https://tech.yandex.ru/market/partner/doc/dg/reference/get-campaigns-id-logins-docpage/
     *
     * @param int $campaignId
     * @param array $params
     *
     * @param null $dbgKey
     * @return string[]
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Yandex\Common\Exception\ForbiddenException
     * @throws \Yandex\Common\Exception\UnauthorizedException
     * @throws \Yandex\Market\Partner\Exception\PartnerRequestException
     */
    public function getCampaignLogins($campaignId, array $params = [], $dbgKey = null)
    {
        $resource = 'campaigns/' . $campaignId . '/logins.json';
        $resource .= '?' . $this->buildQueryString($params, $dbgKey);

        $response = $this->sendRequest('GET', $this->getServiceUrl($resource));

        $decodedResponseBody = $this->getDecodedBody($response->getBody());

        return $decodedResponseBody['logins'];
    }

    /**
     * Get Campaigny by login
     *
     * Returns campaigns by login.
     *
     * @see https://tech.yandex.ru/market/partner/doc/dg/reference/get-campaigns-id-settings-docpage/
     *
     * @param string $login
     * @param array $params
     *
     * @param null $dbgKey
     * @return Campaigns
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Yandex\Common\Exception\ForbiddenException
     * @throws \Yandex\Common\Exception\UnauthorizedException
     * @throws \Yandex\Market\Partner\Exception\PartnerRequestException
     */
    public function getCampaignsByLogin($login, array $params = [], $dbgKey = null)
    {
        $resource = 'campaigns/by_login/' . $login . '/.json';
        $resource .= '?' . $this->buildQueryString($params, $dbgKey);

        $response = $this->sendRequest('GET', $this->getServiceUrl($resource));

        $decodedResponseBody = $this->getDecodedBody($response->getBody());

        $getCampaignsResponse = new GetCampaignsResponse($decodedResponseBody);
        return $getCampaignsResponse->getCampaigns();
    }

    /**
     * Get campaign settings
     *
     * @see https://tech.yandex.ru/market/partner/doc/dg/reference/get-campaigns-id-settings-docpage/
     *
     * @param int $campaignId
     * @param array $params
     *
     * @param null $dbgKey
     * @return \Yandex\Market\Partner\Models\Settings
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Yandex\Common\Exception\ForbiddenException
     * @throws \Yandex\Common\Exception\UnauthorizedException
     * @throws \Yandex\Market\Partner\Exception\PartnerRequestException
     */
    public function getCampaignSettings($campaignId, array $params = [], $dbgKey = null)
    {
        $resource = 'campaigns/' . $campaignId . '/settings.json';
        $resource .= '?' . $this->buildQueryString($params, $dbgKey);

        $response = $this->sendRequest('GET', $this->getServiceUrl($resource));

        $decodedResponseBody = $this->getDecodedBody($response->getBody());

        $getCampaignsResponse = new GetCampaignSettingsResponse($decodedResponseBody);
        return $getCampaignsResponse->getSettings();
    }
}
