<?php
/* @copyright © ООО Яндекс.Маркет (Yandex.Market LLC), 2018 */

namespace Yandex\Market\Partner\Clients;

use GuzzleHttp\Exception\GuzzleException;
use Yandex\Common\Exception\ForbiddenException;
use Yandex\Common\Exception\UnauthorizedException;
use Yandex\Market\Partner\Exception\PartnerRequestException;
use Yandex\Market\Partner\Models\Balance;
use Yandex\Market\Partner\Models\Response\GetBalanceResponse;
use Yandex\Market\Partner\Models\Response\GetInfoForInvoiceResponse;
use Yandex\Market\Partner\Models\Response\InvoiceResponse;
use Yandex\Market\Partner\Models\Response\PostResponse;

class FinanceClient extends Client
{
    /**
     * Get balance and forecast for campaign
     *
     * @see https://tech.yandex.ru/market/partner/doc/dg/reference/get-campaigns-id-balance-docpage/
     *
     * @param int $campaignId
     * @param array $params
     *
     * @return Balance
     * @throws GuzzleException
     * @throws ForbiddenException
     * @throws UnauthorizedException
     * @throws PartnerRequestException
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

    /**
     * Get information for invoice
     *
     * @see https://yandex.ru/dev/market/partner/doc/dg/reference/post-campaigns-id-invoice-paypreview-docpage/
     *
     * @param int $campaignId
     * @param $amount
     * @return GetInfoForInvoiceResponse
     * @throws ForbiddenException
     * @throws GuzzleException
     * @throws PartnerRequestException
     * @throws UnauthorizedException
     */
    public function getInfoForInvoice($campaignId, $amount)
    {
        $resource = 'campaigns/' . $campaignId . '/invoice/paypreview.json?amount=' . $amount;

        $response = $this->sendRequest('POST', $this->getServiceUrl($resource));
        $decodedResponseBody = $this->getDecodedBody($response->getBody());

        return new GetInfoForInvoiceResponse($decodedResponseBody);
    }

    /**
     * Put invoice
     *
     * @see https://yandex.ru/dev/market/partner/doc/dg/reference/post-invoice-docpage/#post-invoice
     *
     * @param array $params
     *
     * @return InvoiceResponse
     * @throws GuzzleException
     * @throws ForbiddenException
     * @throws UnauthorizedException
     * @throws PartnerRequestException
     */
    public function putInvoice(array $params = [])
    {
        $resource = '/invoice.json';
        $response = $this->sendRequest(
            'POST',
            $this->getServiceUrl($resource),
            ['json' => $params]
        );
        $decodedResponseBody = $this->getDecodedBody($response->getBody());

        return new InvoiceResponse($decodedResponseBody);
    }

    /**
     * Get receipt
     *
     * @see https://yandex.ru/dev/market/partner/doc/dg/reference/get-campaigns-id-invoices-id-docpage/
     *
     * @param $campaignId
     * @param $invoiceId
     * @param array $params
     * @return string|PostResponse
     * @throws ForbiddenException
     * @throws GuzzleException
     * @throws PartnerRequestException
     * @throws UnauthorizedException
     */
    public function getReceipt($campaignId, $invoiceId, array $params = [])
    {
        $resource = 'campaigns/' . $campaignId . '/invoices/' . $invoiceId;
        $resource .= '?' . $this->buildQueryString($params);
        $response = $this->sendRequest('GET', $this->getServiceUrl($resource));

        $header = $response->getHeader("Content-Type");
        if ($header[0] == "application/pdf") {
            return $response->getBody()->getContents();
        }

        $decodedResponseBody = $this->getDecodedBody($response->getBody());

        return new PostResponse($decodedResponseBody);
    }
}
