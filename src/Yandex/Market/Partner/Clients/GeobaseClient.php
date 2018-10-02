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
     * @return \Yandex\Market\Partner\Models\Regions
     * @throws \Yandex\Common\Exception\ForbiddenException
     * @throws \Yandex\Common\Exception\UnauthorizedException
     * @throws \Yandex\Market\Partner\Exception\PartnerRequestException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getRegionsMatch(array $params = [])
    {
        $resource = 'regions.json';
        $resource .= '?' . $this->buildQueryString($params);

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
     * @return Regions
     * @throws \Yandex\Common\Exception\ForbiddenException
     * @throws \Yandex\Common\Exception\UnauthorizedException
     * @throws \Yandex\Market\Partner\Exception\PartnerRequestException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getRegion($regionId, array $params = [])
    {
        $resource = 'regions/' . $regionId . '.json';
        $resource .= '?' . $this->buildQueryString($params);

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
     * @return GetRegionsResponse
     * @throws \Yandex\Common\Exception\ForbiddenException
     * @throws \Yandex\Common\Exception\UnauthorizedException
     * @throws \Yandex\Market\Partner\Exception\PartnerRequestException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getRegionChilds($regionId, array $params = [])
    {
        $resource = 'regions/' . $regionId . '/children.json';
        $resource .= '?' . $this->buildQueryString($params);

        $response = $this->sendRequest('GET', $this->getServiceUrl($resource));

        $decodedResponseBody = $this->getDecodedBody($response->getBody());

        return new GetRegionsResponse($decodedResponseBody);
    }
}
