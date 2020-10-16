<?php
/* @copyright © ООО Яндекс.Маркет (Yandex.Market LLC), 2018 */

namespace Yandex\Market\Partner\Clients;

use Yandex\Market\Partner\Models\Regions;
use Yandex\Market\Partner\Models\Response\GetRegionResponse;
use Yandex\Market\Partner\Models\Response\GetRegionsResponse;

class GeobaseClient extends Client
{
    /**
     * Search region by name
     *
     * @see https://tech.yandex.ru/market/partner/doc/dg/reference/get-regions-docpage/
     *
     * @param array $params
     * @param null $dbgKey
     * @return \Yandex\Market\Partner\Models\Regions
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Yandex\Common\Exception\ForbiddenException
     * @throws \Yandex\Common\Exception\UnauthorizedException
     * @throws \Yandex\Market\Partner\Exception\PartnerRequestException
     */
    public function getRegionsMatch(array $params = [], $dbgKey = null)
    {
        $resource = 'regions.json';
        $resource .= '?' . $this->buildQueryString($params, $dbgKey);

        $response = $this->sendRequest('GET', $this->getServiceUrl($resource));

        $decodedResponseBody = $this->getDecodedBody($response->getBody());

        $getRegionsResponse = new GetRegionsResponse($decodedResponseBody);
        return $getRegionsResponse->getRegions();
    }

    /**
     * Get region
     *
     * @see https://tech.yandex.ru/market/partner/doc/dg/reference/get-regions-id-docpage/
     *
     * @param $regionId
     * @param array $params
     * @param null $dbgKey
     * @return Regions
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Yandex\Common\Exception\ForbiddenException
     * @throws \Yandex\Common\Exception\UnauthorizedException
     * @throws \Yandex\Market\Partner\Exception\PartnerRequestException
     */
    public function getRegion($regionId, array $params = [], $dbgKey = null)
    {
        $resource = 'regions/' . $regionId . '.json';
        $resource .= '?' . $this->buildQueryString($params, $dbgKey);

        $response = $this->sendRequest('GET', $this->getServiceUrl($resource));

        $decodedResponseBody = $this->getDecodedBody($response->getBody());

        $getRegionsResponse = new GetRegionsResponse($decodedResponseBody);
        return $getRegionsResponse->getRegions();
    }

    /**
     * Get region childs
     *
     * @see https://tech.yandex.ru/market/partner/doc/dg/reference/get-regions-id-docpage/
     *
     * @param $regionId
     * @param array $params
     * @param null $dbgKey
     * @return GetRegionsResponse
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Yandex\Common\Exception\ForbiddenException
     * @throws \Yandex\Common\Exception\UnauthorizedException
     * @throws \Yandex\Market\Partner\Exception\PartnerRequestException
     */
    public function getRegionChilds($regionId, array $params = [], $dbgKey = null)
    {
        $resource = 'regions/' . $regionId . '/children.json';
        $resource .= '?' . $this->buildQueryString($params, $dbgKey);

        $response = $this->sendRequest('GET', $this->getServiceUrl($resource));

        $decodedResponseBody = $this->getDecodedBody($response->getBody());

        return new GetRegionsResponse($decodedResponseBody);
    }
}
