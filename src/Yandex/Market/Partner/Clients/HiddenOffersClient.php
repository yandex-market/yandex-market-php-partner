<?php
/* @copyright © ООО Яндекс.Маркет (Yandex.Market LLC), 2018 */

namespace Yandex\Market\Partner\Clients;

use Yandex\Market\Partner\Models\Response\GetOfferPricesResponse;
use Yandex\Market\Partner\Models\Response\HiddenOffersResponse;
use Yandex\Market\Partner\Models\Response\PostResponse;

class HiddenOffersClient extends Client
{
    /**
     * Hidden offers list
     *
     * @see https://tech.yandex.ru/market/partner/doc/dg/reference/get-campaigns-id-hidden-offers-docpage/
     *
     * @param $campaignId
     * @param array $params
     * @param null $dbgKey
     * @return HiddenOffersResponse
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Yandex\Common\Exception\ForbiddenException
     * @throws \Yandex\Common\Exception\UnauthorizedException
     * @throws \Yandex\Market\Partner\Exception\PartnerRequestException
     */
    public function getInfo($campaignId, array $params = [], $dbgKey = null)
    {
        $resource = 'campaigns/' . $campaignId . '/hidden-offers.json';
        $resource .= '?' . $this->buildQueryString($params, $dbgKey);

        $response = $this->sendRequest('GET', $this->getServiceUrl($resource));

        $decodedResponseBody = $this->getDecodedBody($response->getBody());

        return new HiddenOffersResponse($decodedResponseBody);
    }

    /**
     * Hide offers and hide settings
     *
     * @see https://tech.yandex.ru/market/partner/doc/dg/reference/post-campaigns-id-hidden-offers-docpage/
     *
     * @param $campaignId
     * @param array $params
     * @param null $dbgKey
     * @return PostResponse
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Yandex\Common\Exception\ForbiddenException
     * @throws \Yandex\Common\Exception\UnauthorizedException
     * @throws \Yandex\Market\Partner\Exception\PartnerRequestException
     */
    public function hideOffers($campaignId, array $params = [], $dbgKey = null)
    {
        $resource = 'campaigns/' . $campaignId . '/hidden-offers.json';
        $resource = $this->addDebugKey($resource, $dbgKey);
        $response = $this->sendRequest(
            'POST',
            $this->getServiceUrl($resource),
            ['json' => $params]
        );

        $decodedResponseBody = $this->getDecodedBody($response->getBody());

        return new PostResponse($decodedResponseBody);
    }

    /**
     * Show offers
     *
     * @see https://tech.yandex.ru/market/partner/doc/dg/reference/delete-campaigns-id-hidden-offers-docpage/
     *
     * @param $campaignId
     * @param array $params
     * @param null $dbgKey
     * @return PostResponse
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Yandex\Common\Exception\ForbiddenException
     * @throws \Yandex\Common\Exception\UnauthorizedException
     * @throws \Yandex\Market\Partner\Exception\PartnerRequestException
     */
    public function showOffers($campaignId, array $params = [], $dbgKey = null)
    {
        $resource = 'campaigns/' . $campaignId . '/hidden-offers.json';
        $resource = $this->addDebugKey($resource, $dbgKey);
        $response = $this->sendRequest(
            'DELETE',
            $this->getServiceUrl($resource),
            ['json' => $params]
        );

        $decodedResponseBody = $this->getDecodedBody($response->getBody());

        return new PostResponse($decodedResponseBody);
    }
}
