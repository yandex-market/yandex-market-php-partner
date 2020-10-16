<?php
/* @copyright © ООО Яндекс.Маркет (Yandex.Market LLC), 2018 */

namespace Yandex\Market\Partner\Clients;

use Yandex\Market\Partner\Models\Response\GetModelInfoResponse;
use Yandex\Market\Partner\Models\Response\GetModelOffersResponse;

class ModelClient extends Client
{
    /* GET */

    /**
     * Get Model Info
     *
     * @see https://tech.yandex.ru/market/partner/doc/dg/reference/get-models-id-docpage/
     *
     * @param $modelId
     * @param array $params
     * @param null $dbgKey
     * @return GetModelInfoResponse
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Yandex\Common\Exception\ForbiddenException
     * @throws \Yandex\Common\Exception\UnauthorizedException
     * @throws \Yandex\Market\Partner\Exception\PartnerRequestException
     */
    public function getModelInfo($modelId, array $params = [], $dbgKey = null)
    {
        $resource = 'models/' . $modelId . '.json';
        $resource .= '?' . $this->buildQueryString($params, $dbgKey);

        $response = $this->sendRequest('GET', $this->getServiceUrl($resource));

        $decodedResponseBody = $this->getDecodedBody($response->getBody());

        return new GetModelInfoResponse($decodedResponseBody);
    }

    /**
     * Search models
     *
     * @see https://tech.yandex.ru/market/partner/doc/dg/reference/get-models-docpage/
     *
     * @param array $params
     * @param null $dbgKey
     * @return GetModelInfoResponse
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Yandex\Common\Exception\ForbiddenException
     * @throws \Yandex\Common\Exception\UnauthorizedException
     * @throws \Yandex\Market\Partner\Exception\PartnerRequestException
     */
    public function getModelMatch(array $params = [], $dbgKey = null)
    {
        $resource = 'models.json';
        $resource .= '?' . $this->buildQueryString($params, $dbgKey);

        $response = $this->sendRequest('GET', $this->getServiceUrl($resource));

        $decodedResponseBody = $this->getDecodedBody($response->getBody());

        return new GetModelInfoResponse($decodedResponseBody);
    }


    /**
     * Get Model Offers
     *
     * @see https://tech.yandex.ru/market/partner/doc/dg/reference/get-models-id-offers-docpage/
     *
     * @param $modelId
     * @param array $params
     * @param null $dbgKey
     * @return GetModelOffersResponse
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Yandex\Common\Exception\ForbiddenException
     * @throws \Yandex\Common\Exception\UnauthorizedException
     * @throws \Yandex\Market\Partner\Exception\PartnerRequestException
     */
    public function getModelOffers($modelId, array $params = [], $dbgKey = null)
    {
        $resource = 'models/' . $modelId . '/offers.json';
        $resource .= '?' . $this->buildQueryString($params, $dbgKey);

        $response = $this->sendRequest('GET', $this->getServiceUrl($resource));

        $decodedResponseBody = $this->getDecodedBody($response->getBody());

        return new GetModelOffersResponse($decodedResponseBody);
    }

    /* POST */

    /**
     * Get info about several Models
     *
     * @see https://tech.yandex.ru/market/partner/doc/dg/reference/post-models-docpage/
     *
     * @param array $params
     * @param array $getParams
     * @param null $dbgKey
     * @return GetModelInfoResponse
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Yandex\Common\Exception\ForbiddenException
     * @throws \Yandex\Common\Exception\UnauthorizedException
     * @throws \Yandex\Market\Partner\Exception\PartnerRequestException
     */
    public function getModelsInfo(array $params = [], array $getParams = [], $dbgKey = null)
    {
        $resource = 'models.json';
        $resource .= '?' . $this->buildQueryString($getParams, $dbgKey);
        $response = $this->sendRequest(
            'POST',
            $this->getServiceUrl($resource),
            ['json' => $params]
        );

        $decodedResponseBody = $this->getDecodedBody($response->getBody());

        return new GetModelInfoResponse($decodedResponseBody);
    }

    /**
     * Get offers for several model
     *
     * @see https://tech.yandex.ru/market/partner/doc/dg/reference/post-models-offers-docpage/
     * @param $regionId
     * @param array $params
     * @param array $queryParams
     * @param null $dbgKey
     * @return GetModelOffersResponse
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Yandex\Common\Exception\ForbiddenException
     * @throws \Yandex\Common\Exception\UnauthorizedException
     * @throws \Yandex\Market\Partner\Exception\PartnerRequestException
     */
    public function getModelsOffers($regionId, array $params = [], array $queryParams = [], $dbgKey = null)
    {
        $resource = 'models/offers.json?regionId=' . $regionId;
        $resource .= '&' . $this->buildQueryString($queryParams, $dbgKey);
        $response = $this->sendRequest(
            'POST',
            $this->getServiceUrl($resource),
            ['json' => $params]
        );

        $decodedResponseBody = $this->getDecodedBody($response->getBody());

        return new GetModelOffersResponse($decodedResponseBody);
    }
}
