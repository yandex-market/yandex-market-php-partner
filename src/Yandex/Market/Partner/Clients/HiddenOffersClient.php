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
     * @return HiddenOffersResponse
     * @throws \Yandex\Common\Exception\ForbiddenException
     * @throws \Yandex\Common\Exception\UnauthorizedException
     * @throws \Yandex\Market\Partner\Exception\PartnerRequestException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getInfo($campaignId, array $params = [])
    {
        $resource = 'campaigns/' . $campaignId . '/hidden-offers.json';
        $resource .= '?' . $this->buildQueryString($params);

        $response = $this->sendRequest('GET', $this->getServiceUrl($resource));

        $decodedResponseBody = $this->getDecodedBody($response->getBody());

        var_dump($decodedResponseBody['result']);

        return new HiddenOffersResponse($decodedResponseBody['result']);
    }

    /**
     * Hide offers and hide settings
     *
     * @see https://tech.yandex.ru/market/partner/doc/dg/reference/post-campaigns-id-hidden-offers-docpage/
     *
     * @return PostResponse
     * @throws \Yandex\Common\Exception\ForbiddenException
     * @throws \Yandex\Common\Exception\UnauthorizedException
     * @throws \Yandex\Market\Partner\Exception\PartnerRequestException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function hideOffers($campaignId, array $params = [])
    {
        $resource = 'campaigns/' . $campaignId . '/hidden-offers.json';

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
     * @return PostResponse
     * @throws \Yandex\Common\Exception\ForbiddenException
     * @throws \Yandex\Common\Exception\UnauthorizedException
     * @throws \Yandex\Market\Partner\Exception\PartnerRequestException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function showOffers($campaignId, array $params = [])
    {
        $resource = 'campaigns/' . $campaignId . '/hidden-offers.json';

        $response = $this->sendRequest(
            'DELETE',
            $this->getServiceUrl($resource),
            ['json' => $params]
        );

        $decodedResponseBody = $this->getDecodedBody($response->getBody());

        return new PostResponse($decodedResponseBody);
    }
}
