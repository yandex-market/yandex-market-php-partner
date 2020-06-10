<?php

namespace Yandex\Tests\Market;

use GuzzleHttp\Psr7\Response;
use Yandex\Market\Partner\Clients\FinanceClient;
use Yandex\Tests\TestCase;

/**
 * PackageTest
 *
 * @category Yandex
 * @package  Tests
 *
 * @author   Kirill Litvinov <Kirill.Litvinov@nixsolutions.com>
 * @created  31.08.2018 15:31
 */
class FinanceClientTest extends TestCase
{
    protected $fixturesFolder = 'fixtures';

    function testGetBalance()
    {
        $json = file_get_contents(__DIR__ . '/' . $this->fixturesFolder . '/balance.json');
        $jsonObj = json_decode($json);
        $response = new Response(200, [], \GuzzleHttp\Psr7\stream_for($json));

        $mock = $this->getMockBuilder(FinanceClient::class)
            ->setMethods(['sendRequest'])
            ->getMock();
        $mock->expects($this->any())
            ->method('sendRequest')
            ->will($this->returnValue($response));

        $balance = $mock->getBalance(2222);

        $this->assertEquals(
            $jsonObj->balance->balance,
            $balance->getBalance()
        );
        $this->assertEquals(
            $jsonObj->balance->daysLeft,
            $balance->getDaysLeft()
        );
        $this->assertEquals(
            $jsonObj->balance->recommendedPayment,
            $balance->getRecommendedPayment()
        );
    }

    public function testGetInfoForInvoice()
    {
        $json = file_get_contents(__DIR__ . '/' . $this->fixturesFolder . '/infoForInvoice.json');
        $jsonObj = json_decode($json);
        $response = new Response(200, [], \GuzzleHttp\Psr7\stream_for($json));

        $mock = $this->getMockBuilder(FinanceClient::class)
            ->setMethods(['sendRequest'])
            ->getMock();
        $mock->expects($this->any())
            ->method('sendRequest')
            ->will($this->returnValue($response));

        $resp = $mock->getInfoForInvoice(2222, 111);
        $result = $resp->getResult();

        $this->assertEquals(
            $jsonObj->result->url,
            $result->getUrl()
        );
        $this->assertEquals(
            $jsonObj->result->requestId,
            $result->getRequestId()
        );
        $this->assertEquals(
            $jsonObj->result->parentPerson->clientId,
            $result->getParentPerson()->geClientId()
        );
        $this->assertEquals(
            $jsonObj->result->parentPerson->name,
            $result->getParentPerson()->geName()
        );
        $this->assertEquals(
            $jsonObj->result->parentPerson->isAgency,
            $result->getParentPerson()->getIsAgency()
        );
        $pcps = $result->getPcps();
        $pcp = $pcps->current();
        for ($i = 0; $i < $pcps->count(); $i++) {
            $this->assertEquals(
                $jsonObj->result->pcps[$i]->person->personId,
                $pcp->getPerson()->getPersonId()
            );
            $paysyses = $pcp->getPaysyses();
            $paysys = $paysyses->current();
            for ($j = 0; $j < $paysyses->count(); $j++) {
                $this->assertEquals(
                    $jsonObj->result->pcps[$i]->paysyses[$j]->paysysId,
                    $paysys->getPaysysId()
                );
                $paysys = $paysyses->next();
            }

            $pcp = $pcps->next();
        }
    }

    public function testPutInvoice()
    {
        $json = file_get_contents(__DIR__ . '/' . $this->fixturesFolder . '/invoice.json');
        $jsonObj = json_decode($json);
        $response = new Response(200, [], \GuzzleHttp\Psr7\stream_for($json));
        $mock = $this->getMockBuilder(FinanceClient::class)
            ->setMethods(['sendRequest'])
            ->getMock();
        $mock->expects($this->any())
            ->method('sendRequest')
            ->will($this->returnValue($response));

        $res = $mock->putInvoice();
        $invoices = $res->getInvoices();
        $invoice = $invoices->current();
        for ($i = 0; $i < $invoices->count(); $i++) {
            $this->assertEquals(
                $jsonObj->result->invoices[$i]->invoiceId,
                $invoice->getInvoiceId()
            );
            $this->assertEquals(
                $jsonObj->result->invoices[$i]->externalId,
                $invoice->getExternalId()
            );
            $this->assertEquals(
                $jsonObj->result->invoices[$i]->date,
                $invoice->getDate()
            );
            $invoice = $invoices->next();
        }
    }
}
