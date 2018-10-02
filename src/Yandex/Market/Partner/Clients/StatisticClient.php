<?php
/* @copyright © ООО Яндекс.Маркет (Yandex.Market LLC), 2018 */

namespace Yandex\Market\Partner\Clients;

use Yandex\Market\Partner\Models\Response\GetOffersStatsResponse;
use Yandex\Market\Partner\Models\Response\GetStatsResponse;
use Yandex\Market\Partner\Models\Stats;

class StatisticClient extends Client
{
    /**
     * Get stats for every requested period
     *
     * @see https://tech.yandex.ru/market/partner/doc/dg/reference/get-campaigns-id-stats-main-docpage/
     *
     * @param int $campaignId
     * @param array $params
     *
     * @return Stats
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Yandex\Common\Exception\ForbiddenException
     * @throws \Yandex\Common\Exception\UnauthorizedException
     * @throws \Yandex\Market\Partner\Exception\PartnerRequestException
     */
    public function getMain($campaignId, array $params = [])
    {
        $resource = 'campaigns/' . $campaignId . '/stats/main.json';
        $resource .= '?' . $this->buildQueryString($params);
        return $this->getStatsResponse($resource);
    }

    /**
     * @param int $campaignId
     * @param string $resource
     * @param array $params
     *
     * @return Stats
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Yandex\Common\Exception\ForbiddenException
     * @throws \Yandex\Common\Exception\UnauthorizedException
     * @throws \Yandex\Market\Partner\Exception\PartnerRequestException
     */
    private function getStatsResponse($resource)
    {
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
     * @return Stats
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Yandex\Common\Exception\ForbiddenException
     * @throws \Yandex\Common\Exception\UnauthorizedException
     * @throws \Yandex\Market\Partner\Exception\PartnerRequestException
     */
    public function getDaily($campaignId, array $params = [])
    {
        $resource = 'campaigns/' . $campaignId . '/stats/main-daily.json';
        $resource .= '?' . $this->buildQueryString($params);
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
     * @return Stats
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Yandex\Common\Exception\ForbiddenException
     * @throws \Yandex\Common\Exception\UnauthorizedException
     * @throws \Yandex\Market\Partner\Exception\PartnerRequestException
     */
    public function getWeekly($campaignId, array $params = [])
    {
        $resource = 'campaigns/' . $campaignId . '/stats/main-weekly.json';
        $resource .= '?' . $this->buildQueryString($params);
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
     * @return Stats
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Yandex\Common\Exception\ForbiddenException
     * @throws \Yandex\Common\Exception\UnauthorizedException
     * @throws \Yandex\Market\Partner\Exception\PartnerRequestException
     */
    public function getMonthly($campaignId, array $params = [])
    {
        $resource = 'campaigns/' . $campaignId . '/stats/main-monthly.json';
        $resource .= '?' . $this->buildQueryString($params);
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
     * @return GetOffersStatsResponse
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Yandex\Common\Exception\ForbiddenException
     * @throws \Yandex\Common\Exception\UnauthorizedException
     * @throws \Yandex\Market\Partner\Exception\PartnerRequestException
     */
    public function getOffersStats($campaignId, array $params = [])
    {
        $resource = 'campaigns/' . $campaignId . '/stats/offers.json';
        $resource .= '?' . $this->buildQueryString($params);
        $response = $this->sendRequest('GET', $this->getServiceUrl($resource));

        $decodedResponseBody = $this->getDecodedBody($response->getBody());

        return new GetOffersStatsResponse($decodedResponseBody);
    }
}
