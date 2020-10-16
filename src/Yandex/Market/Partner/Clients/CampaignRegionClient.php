<?php
/* @copyright © ООО Яндекс.Маркет (Yandex.Market LLC), 2018 */

namespace Yandex\Market\Partner\Clients;

use Yandex\Market\Partner\Models\Region;
use Yandex\Market\Partner\Models\Response\GetCampaignRegionResponse;

class CampaignRegionClient extends Client
{
    /**
     * Get Shop Region
     *
     * Returns region by shop.
     *
     * @see https://tech.yandex.ru/market/partner/doc/dg/reference/get-campaigns-id-region-docpage/
     *
     * @param $campaignId
     * @param array $params
     *
     * @param null $dbgKey
     * @return Region
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Yandex\Common\Exception\ForbiddenException
     * @throws \Yandex\Common\Exception\UnauthorizedException
     * @throws \Yandex\Market\Partner\Exception\PartnerRequestException
     */
    public function getRegion($campaignId, $params = [], $dbgKey = null)
    {
        $resource = 'campaigns/' . $campaignId . '/region.json';
        $resource .= '?' . $this->buildQueryString($params, $dbgKey);

        $response = $this->sendRequest('GET', $this->getServiceUrl($resource));

        $decodedResponseBody = $this->getDecodedBody($response->getBody());

        $getCampaignsResponse = new GetCampaignRegionResponse($decodedResponseBody);
        return $getCampaignsResponse->getRegion();
    }
}
