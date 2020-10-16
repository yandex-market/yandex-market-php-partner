<?php
/* @copyright © ООО Яндекс.Маркет (Yandex.Market LLC), 2018 */

namespace Yandex\Market\Partner\Clients;

use Yandex\Market\Partner\Models\Response\GetOffersStatsResponse;
use Yandex\Market\Partner\Models\Response\GetStatsResponse;
use Yandex\Market\Partner\Models\Stats;

class StatisticClient extends Client
{
    const FIELDS_MOBILE = 'mobile';
    const FIELDS_MODEL = 'model';
    const FIELDS_SHOWS = 'shows';

    /**
     * Get stats for every requested period
     *
     * @see https://tech.yandex.ru/market/partner/doc/dg/reference/get-campaigns-id-stats-main-docpage/
     *
     * @param int $campaignId
     * @param array $params
     *
     * @param null $dbgKey
     * @return Stats
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Yandex\Common\Exception\ForbiddenException
     * @throws \Yandex\Common\Exception\UnauthorizedException
     * @throws \Yandex\Market\Partner\Exception\PartnerRequestException
     */
    public function getMain($campaignId, array $params = [], $dbgKey = null)
    {
        $resource = 'campaigns/' . $campaignId . '/stats/main.json';
        $resource .= '?' . $this->buildQueryString($params, $dbgKey);
        return $this->getStatsResponse($resource);
    }

    /**
     * @param string $resource
     * @param null $dbgKey
     * @return Stats
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Yandex\Common\Exception\ForbiddenException
     * @throws \Yandex\Common\Exception\UnauthorizedException
     * @throws \Yandex\Market\Partner\Exception\PartnerRequestException
     */
    private function getStatsResponse($resource, $dbgKey = null)
    {
        $resource = $this->addDebugKey($resource, $dbgKey);
        $response = $this->sendRequest('GET', $this->getServiceUrl($resource));

        $decodedResponseBody = $this->getDecodedBody($response->getBody());

        $getStatsResponse = new GetStatsResponse($decodedResponseBody);
        return $getStatsResponse->getMainStats();
    }

    /**
     * Get stats for every requested period by days
     *
     * @see https://tech.yandex.ru/market/partner/doc/dg/reference/get-campaigns-id-stats-main-docpage/
     *
     * @param int $campaignId
     * @param array $params
     *
     * @param null $dbgKey
     * @return Stats
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Yandex\Common\Exception\ForbiddenException
     * @throws \Yandex\Common\Exception\UnauthorizedException
     * @throws \Yandex\Market\Partner\Exception\PartnerRequestException
     */
    public function getDaily($campaignId, array $params = [], $dbgKey = null)
    {
        $resource = 'campaigns/' . $campaignId . '/stats/main-daily.json';
        $resource .= '?' . $this->buildQueryString($params, $dbgKey);
        return $this->getStatsResponse($resource);
    }

    /**
     * Get stats for every requested period by weeks
     *
     * @see https://tech.yandex.ru/market/partner/doc/dg/reference/get-campaigns-id-stats-main-docpage/
     *
     * @param int $campaignId
     * @param array $params
     *
     * @param null $dbgKey
     * @return Stats
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Yandex\Common\Exception\ForbiddenException
     * @throws \Yandex\Common\Exception\UnauthorizedException
     * @throws \Yandex\Market\Partner\Exception\PartnerRequestException
     */
    public function getWeekly($campaignId, array $params = [], $dbgKey = null)
    {
        $resource = 'campaigns/' . $campaignId . '/stats/main-weekly.json';
        $resource .= '?' . $this->buildQueryString($params, $dbgKey);
        return $this->getStatsResponse($resource);
    }

    /**
     * Get stats for every requested period by months
     *
     * @see https://tech.yandex.ru/market/partner/doc/dg/reference/get-campaigns-id-stats-main-docpage/
     *
     * @param int $campaignId
     * @param array $params
     *
     * @param null $dbgKey
     * @return Stats
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Yandex\Common\Exception\ForbiddenException
     * @throws \Yandex\Common\Exception\UnauthorizedException
     * @throws \Yandex\Market\Partner\Exception\PartnerRequestException
     */
    public function getMonthly($campaignId, array $params = [], $dbgKey = null)
    {
        $resource = 'campaigns/' . $campaignId . '/stats/main-monthly.json';
        $resource .= '?' . $this->buildQueryString($params, $dbgKey);
        return $this->getStatsResponse($resource);
    }

    /**
     * Get offer stats
     *
     * @see https://tech.yandex.ru/market/partner/doc/dg/reference/get-campaigns-id-stats-main-docpage/
     *
     * @param int $campaignId
     * @param array $params
     *
     * @param null $dbgKey
     * @return GetOffersStatsResponse
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Yandex\Common\Exception\ForbiddenException
     * @throws \Yandex\Common\Exception\UnauthorizedException
     * @throws \Yandex\Market\Partner\Exception\PartnerRequestException
     */
    public function getOffersStats($campaignId, array $params = [], $dbgKey = null)
    {
        $resource = 'campaigns/' . $campaignId . '/stats/offers.json';
        $resource .= '?' . $this->buildQueryString($params, $dbgKey);
        $response = $this->sendRequest('GET', $this->getServiceUrl($resource));

        $decodedResponseBody = $this->getDecodedBody($response->getBody());

        return new GetOffersStatsResponse($decodedResponseBody);
    }
}
