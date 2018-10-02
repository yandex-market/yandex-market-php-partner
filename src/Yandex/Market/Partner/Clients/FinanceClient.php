<?php
/* @copyright © ООО Яндекс.Маркет (Yandex.Market LLC), 2018 */

namespace Yandex\Market\Partner\Clients;

use Yandex\Market\Partner\Models\Balance;
use Yandex\Market\Partner\Models\Response\GetBalanceResponse;

class FinanceClient extends Client
{
    /**
     * Get balance and forecast for campaign
     *
     * @see https://tech.yandex.ru/market/partner/doc/dg/reference/get-campaigns-id-balance-docpage/
     *
     * @param int   $campaignId
     * @param array $params
     *
     * @return Balance
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Yandex\Common\Exception\ForbiddenException
     * @throws \Yandex\Common\Exception\UnauthorizedException
     * @throws \Yandex\Market\Partner\Exception\PartnerRequestException
     */
    public function getBalance($campaignId, array $params = [])
    {
        $resource = 'campaigns/' . $campaignId . '/balance.json';
        $resource .= '?' . $this->buildQueryString($params);

        $response = $this->sendRequest('GET', $this->getServiceUrl($resource));

        $decodedResponseBody = $this->getDecodedBody($response->getBody());

        $getBalanceResponse = new GetBalanceResponse($decodedResponseBody);
        return $getBalanceResponse->getBalance();
    }
}
