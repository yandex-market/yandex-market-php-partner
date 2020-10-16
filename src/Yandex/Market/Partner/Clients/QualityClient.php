<?php
/* @copyright © ООО Яндекс.Маркет (Yandex.Market LLC), 2018 */

namespace Yandex\Market\Partner\Clients;

use Yandex\Market\Partner\Models\Report;
use Yandex\Market\Partner\Models\Response\CheckCampaignResponse;
use Yandex\Market\Partner\Models\Response\GetReportResponse;
use Yandex\Market\Partner\Models\Response\GetTicketsResponse;
use Yandex\Market\Partner\Models\Response\PostResponse;
use Yandex\Market\Partner\Models\Tickets;

class QualityClient extends Client
{
    const ACTUAL_TYPE_0 = 0;
    const ACTUAL_TYPE_1 = 1;

    /**
     * Get campaign tickets
     *
     * @see https://tech.yandex.ru/market/partner/doc/dg/reference/get-campaigns-id-quality-tickets-docpage/
     *
     * @param int $campaignId
     * @param array $params
     *
     * @param null $dbgKey
     * @return \Yandex\Market\Partner\Models\Tickets
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Yandex\Common\Exception\ForbiddenException
     * @throws \Yandex\Common\Exception\UnauthorizedException
     * @throws \Yandex\Market\Partner\Exception\PartnerRequestException
     */
    public function getTickets($campaignId, array $params = [], $dbgKey = null)
    {
        $resource = 'campaigns/' . $campaignId . '/quality/tickets.json';
        $resource .= '?' . $this->buildQueryString($params, $dbgKey);

        $response = $this->sendRequest('GET', $this->getServiceUrl($resource));

        $decodedResponseBody = $this->getDecodedBody($response->getBody());

        $getTicketsResponse = new GetTicketsResponse($decodedResponseBody);
        return $getTicketsResponse->getTickets();
    }

    /**
     * Get ticket info
     *
     * @see https://tech.yandex.ru/market/partner/doc/dg/reference/get-campaigns-id-quality-tickets-docpage/
     *
     * @param int $campaignId
     * @param int $ticketId
     * @param array $params
     *
     * @param null $dbgKey
     * @return \Yandex\Market\Partner\Models\Tickets
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Yandex\Common\Exception\ForbiddenException
     * @throws \Yandex\Common\Exception\UnauthorizedException
     * @throws \Yandex\Market\Partner\Exception\PartnerRequestException
     */
    public function getTicket($campaignId, $ticketId, array $params = [], $dbgKey = null)
    {
        $resource = 'campaigns/' . $campaignId . '/quality/tickets/' . $ticketId . '.json';
        $resource .= '?' . $this->buildQueryString($params, $dbgKey);

        $response = $this->sendRequest('GET', $this->getServiceUrl($resource));

        $decodedResponseBody = $this->getDecodedBody($response->getBody());

        $getTicketsResponse = new GetTicketsResponse($decodedResponseBody);
        return $getTicketsResponse->getTickets();
    }

    /**
     * Get report
     *
     * @see https://tech.yandex.ru/market/partner/doc/dg/reference/get-campaigns-id-quality-report-docpage/
     *
     * @param int $campaignId
     * @param array $params
     *
     * @param null $dbgKey
     * @return Report
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Yandex\Common\Exception\ForbiddenException
     * @throws \Yandex\Common\Exception\UnauthorizedException
     * @throws \Yandex\Market\Partner\Exception\PartnerRequestException
     */
    public function getReport($campaignId, array $params = [], $dbgKey = null)
    {
        $resource = 'campaigns/' . $campaignId . '/quality/report.json';
        $resource .= '?' . $this->buildQueryString($params, $dbgKey);

        $response = $this->sendRequest('GET', $this->getServiceUrl($resource));

        $decodedResponseBody = $this->getDecodedBody($response->getBody());

        $getTicketsResponse = new GetReportResponse($decodedResponseBody);
        return $getTicketsResponse->getResult();
    }

    /* POST */

    /**
     * Tells the Yandex.Market quality control service that the bug is fixed.
     *
     * @see https://tech.yandex.ru/market/partner/doc/dg/reference/post-campaigns-id-quality-tickets-id-fix-docpage/
     *
     * @param int $campaignId
     * @param int $ticketId
     * @param array $params
     *
     * @param null $dbgKey
     * @return PostResponse
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Yandex\Common\Exception\ForbiddenException
     * @throws \Yandex\Common\Exception\UnauthorizedException
     * @throws \Yandex\Market\Partner\Exception\PartnerRequestException
     */
    public function fixError($campaignId, $ticketId, array $params = [], $dbgKey = null)
    {
        $resource = 'campaigns/' . $campaignId . '/tickets/' . $ticketId . 'fix.json';
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
     * Send campaign to Market Checking
     *
     * @see https://tech.yandex.ru/market/partner/doc/dg/reference/post-campaigns-id-quality-check-docpage/
     *
     * @param int $campaignId
     *
     * @param null $dbgKey
     * @return CheckCampaignResponse
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Yandex\Common\Exception\ForbiddenException
     * @throws \Yandex\Common\Exception\UnauthorizedException
     * @throws \Yandex\Market\Partner\Exception\PartnerRequestException
     */
    public function checkCampaign($campaignId, $dbgKey = null)
    {
        $resource = 'campaigns/' . $campaignId . '/quality/check.json';
        $resource = $this->addDebugKey($resource, $dbgKey);
        $response = $this->sendRequest('POST', $this->getServiceUrl($resource));

        $decodedResponseBody = $this->getDecodedBody($response->getBody());

        return new CheckCampaignResponse($decodedResponseBody);
    }
}
