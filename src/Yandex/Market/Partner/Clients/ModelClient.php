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
     * @return GetModelInfoResponse
     * @throws \Yandex\Common\Exception\ForbiddenException
     * @throws \Yandex\Common\Exception\UnauthorizedException
     * @throws \Yandex\Market\Partner\Exception\PartnerRequestException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getModelInfo($modelId, array $params = [])
    {
        $resource = 'models/' . $modelId . '.json';
        $resource .= '?' . $this->buildQueryString($params);

        $response = $this->sendRequest('GET', $this->getServiceUrl($resource));

        $decodedResponseBody = $this->getDecodedBody($response->getBody());

        return new GetModelInfoResponse($decodedResponseBody);
    }

    /**
     * Search models
     *
     * @see https://tech.yandex.ru/market/partner/doc/dg/reference/get-models-docpage/
     *
     * @return GetModelInfoResponse
     * @throws \Yandex\Common\Exception\ForbiddenException
     * @throws \Yandex\Common\Exception\UnauthorizedException
     * @throws \Yandex\Market\Partner\Exception\PartnerRequestException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getModelMatch(array $params = [])
    {
        $resource = 'models.json';
        $resource .= '?' . $this->buildQueryString($params);

        $response = $this->sendRequest('GET', $this->getServiceUrl($resource));

        $decodedResponseBody = $this->getDecodedBody($response->getBody());

        return new GetModelInfoResponse($decodedResponseBody);
    }


    /**
     * Get Model Offers
     *
     * @see https://tech.yandex.ru/market/partner/doc/dg/reference/get-models-id-offers-docpage/
     *
     * @return GetModelOffersResponse
     * @throws \Yandex\Common\Exception\ForbiddenException
     * @throws \Yandex\Common\Exception\UnauthorizedException
     * @throws \Yandex\Market\Partner\Exception\PartnerRequestException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getModelOffers($modelId, array $params = [])
    {
        $resource = 'models/' . $modelId . '/offers.json';
        $resource .= '?' . $this->buildQueryString($params);

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
     * @return GetModelInfoResponse
     * @throws \Yandex\Common\Exception\ForbiddenException
     * @throws \Yandex\Common\Exception\UnauthorizedException
     * @throws \Yandex\Market\Partner\Exception\PartnerRequestException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getModelsInfo(array $params = [])
    {
        $resource = 'models.json';

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
     *
     * @return GetModelOffersResponse
     * @throws \Yandex\Common\Exception\ForbiddenException
     * @throws \Yandex\Common\Exception\UnauthorizedException
     * @throws \Yandex\Market\Partner\Exception\PartnerRequestException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getModelsOffers($regionId, array $params = [])
    {
        $resource = 'models/offers.json?regionId=' . $regionId;

        $response = $this->sendRequest(
            'POST',
            $this->getServiceUrl($resource),
            ['json' => $params]
        );

        $decodedResponseBody = $this->getDecodedBody($response->getBody());

        return new GetModelOffersResponse($decodedResponseBody);
    }
}
