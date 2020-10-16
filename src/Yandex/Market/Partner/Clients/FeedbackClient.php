<?php

namespace Yandex\Market\Partner\Clients;

use Yandex\Market\Partner\Models\Response\GetFeedbackResponse;

class FeedbackClient extends Client
{
    /**
     * Returns new and updated feedbacks
     *
     * @see https://yandex.ru/dev/market/partner/doc/dg/reference/get-campaigns-id-feedback-updates-docpage/
     *
     * @param $campaignId
     * @param array $params
     * @param null $dbgKey
     * @return GetFeedbackResponse
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Yandex\Common\Exception\ForbiddenException
     * @throws \Yandex\Common\Exception\UnauthorizedException
     * @throws \Yandex\Market\Partner\Exception\PartnerRequestException
     */
    public function getFeedback($campaignId, array $params = [], $dbgKey = null)
    {
        $resource = 'campaigns/' . $campaignId . '/feedback/updates.json';
        $resource .= '?' . $this->buildQueryString($params, $dbgKey);
        $response = $this->sendRequest('GET', $this->getServiceUrl($resource));
        $decodedResponseBody = $this->getDecodedBody($response->getBody());

        return new GetFeedbackResponse($decodedResponseBody);

    }
}