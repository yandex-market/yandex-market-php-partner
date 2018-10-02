<?php

namespace Yandex\Tests\Market;

use GuzzleHttp\Psr7\Response;
use Yandex\Market\Partner\Clients\QualityClient;
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
class QualityClientTest extends TestCase
{
    protected $fixturesFolder = 'fixtures';

    public function testGetTicket()
    {
        $json = file_get_contents(__DIR__ . '/' . $this->fixturesFolder . '/ticket.json');
        $jsonObj = json_decode($json);
        $response = new Response(200, [], \GuzzleHttp\Psr7\stream_for($json));

        $mock = $this->getMockBuilder(QualityClient::class)
            ->setMethods(['sendRequest'])
            ->getMock();
        $mock->expects($this->any())
            ->method('sendRequest')
            ->will($this->returnValue($response));

        $tickets = $mock->getTicket(2222, 1234);
        $ticketsCount = $tickets->count();

        $ticket = $tickets->current();

        for ($i = 0; $i < $ticketsCount; $i++) {
            $this->assertEquals(
                $jsonObj->result->tickets[$i]->checkMethod,
                $ticket->getCheckMethod()
            );
            $this->assertEquals(
                $jsonObj->result->tickets[$i]->errorCode,
                $ticket->getErrorCode()
            );
            $this->assertEquals(
                $jsonObj->result->tickets[$i]->errorFoundTime,
                $ticket->getErrorFoundTime()
            );
            $this->assertEquals(
                $jsonObj->result->tickets[$i]->errorText,
                $ticket->getErrorText()
            );
            $this->assertEquals(
                $jsonObj->result->tickets[$i]->feedTime,
                $ticket->getFeedTime()
            );
            $this->assertEquals(
                $jsonObj->result->tickets[$i]->offerURL,
                $ticket->getOfferURL()
            );
            $this->assertEquals(
                $jsonObj->result->tickets[$i]->status,
                $ticket->getStatus()
            );
            $this->assertEquals(
                $jsonObj->result->tickets[$i]->ticketId,
                $ticket->getTicketId()
            );
            $ticket = $tickets->next();
        }
    }

    public function testGetTickets()
    {
        $json = file_get_contents(__DIR__ . '/' . $this->fixturesFolder . '/tickets.json');
        $jsonObj = json_decode($json);
        $response = new Response(200, [], \GuzzleHttp\Psr7\stream_for($json));

        $mock = $this->getMockBuilder(QualityClient::class)
            ->setMethods(['sendRequest'])
            ->getMock();
        $mock->expects($this->any())
            ->method('sendRequest')
            ->will($this->returnValue($response));

        $tickets = $mock->getTickets(2222, []);
        $ticketsCount = $tickets->count();

        $ticket = $tickets->current();

        for ($i = 0; $i < $ticketsCount; $i++) {
            $this->assertEquals(
                $jsonObj->result->tickets[$i]->checkMethod,
                $ticket->getCheckMethod()
            );
            $this->assertEquals(
                $jsonObj->result->tickets[$i]->errorCode,
                $ticket->getErrorCode()
            );
            $this->assertEquals(
                $jsonObj->result->tickets[$i]->errorFoundTime,
                $ticket->getErrorFoundTime()
            );
            $this->assertEquals(
                $jsonObj->result->tickets[$i]->errorText,
                $ticket->getErrorText()
            );
            $this->assertEquals(
                $jsonObj->result->tickets[$i]->feedTime,
                $ticket->getFeedTime()
            );
            $this->assertEquals(
                $jsonObj->result->tickets[$i]->offerURL,
                $ticket->getOfferURL()
            );
            $this->assertEquals(
                $jsonObj->result->tickets[$i]->status,
                $ticket->getStatus()
            );
            $this->assertEquals(
                $jsonObj->result->tickets[$i]->ticketId,
                $ticket->getTicketId()
            );

            $ticket = $tickets->next();
        }
    }

    public function testGetReport()
    {
        $json = file_get_contents(__DIR__ . '/' . $this->fixturesFolder . '/report.json');
        $jsonObj = json_decode($json);
        $response = new Response(200, [], \GuzzleHttp\Psr7\stream_for($json));

        $mock = $this->getMockBuilder(QualityClient::class)
            ->setMethods(['sendRequest'])
            ->getMock();
        $mock->expects($this->any())
            ->method('sendRequest')
            ->will($this->returnValue($response));

        $report = $mock->getReport(2222, ['test' => true]);

        $this->assertEquals(
            $jsonObj->result->actualErrorCount,
            $report->getActualErrorCount()
        );
        $this->assertEquals(
            $jsonObj->result->ageBonus,
            $report->getAgeBonus()
        );
        $this->assertEquals(
            $jsonObj->result->archiveErrorCount,
            $report->getArchiveErrorCount()
        );
        $this->assertEquals(
            $jsonObj->result->checkCount,
            $report->getCheckCount()
        );
        $this->assertEquals(
            $jsonObj->result->cloneCount,
            $report->getCloneCount()
        );
        $this->assertEquals(
            $jsonObj->result->errorCount,
            $report->getErrorCount()
        );
        $this->assertEquals(
            $jsonObj->result->gradeCount,
            $report->getGradeCount()
        );
        $this->assertEquals(
            $jsonObj->result->marketRating,
            $report->getMarketRating()
        );
        $this->assertEquals(
            $jsonObj->result->modificationTime,
            $report->getModificationTime()
        );
        $this->assertEquals(
            $jsonObj->result->opinionCount,
            $report->getOpinionCount()
        );
        $this->assertEquals(
            $jsonObj->result->opinionUrl,
            $report->getOpinionUrl()
        );
        $this->assertEquals(
            $jsonObj->result->qualityBonus,
            $report->getQualityBonus()
        );
        $this->assertEquals(
            $jsonObj->result->qualityServiceRating,
            $report->getQualityServiceRating()
        );
    }

    public function testFixError()
    {
        $json = file_get_contents(__DIR__ . '/' . $this->fixturesFolder . '/postResponse.json');
        $jsonObj = json_decode($json);
        $response = new Response(200, [], \GuzzleHttp\Psr7\stream_for($json));

        $mock = $this->getMockBuilder(QualityClient::class)
            ->setMethods(['sendRequest'])
            ->getMock();
        $mock->expects($this->any())
            ->method('sendRequest')
            ->will($this->returnValue($response));

        $response = $mock->fixError(2222, 1234);

        $this->assertEquals(
            $jsonObj->status,
            $response->getStatus()
        );


        $errors = $response->getErrors();
        $errorsCount = $errors->count();
        $error = $errors->current();

        for ($i = 0; $i < $errorsCount; $i++) {
            if (isset($jsonObj->errors[$i]->message)) {
                $this->assertEquals(
                    $jsonObj->errors[$i]->message,
                    $error->getMessage()
                );
            }
            if (isset($jsonObj->errors[$i]->code)) {
                $this->assertEquals(
                    $jsonObj->errors[$i]->code,
                    $error->getCode()
                );
            }
            $error = $errors->next();
        }
    }

    public function testCheckCampaign()
    {
        $json = file_get_contents(__DIR__ . '/' . $this->fixturesFolder . '/checkCampaignResponse.json');
        $jsonObj = json_decode($json);
        $response = new Response(200, [], \GuzzleHttp\Psr7\stream_for($json));

        $mock = $this->getMockBuilder(QualityClient::class)
            ->setMethods(['sendRequest'])
            ->getMock();
        $mock->expects($this->any())
            ->method('sendRequest')
            ->will($this->returnValue($response));

        $checkResponse = $mock->checkCampaign(2222);

        $this->assertEquals(
            $jsonObj->result->message,
            $checkResponse->getMessage()
        );

        $this->assertEquals(
            $jsonObj->result->estimatedEndTime,
            $checkResponse->getEstimatedEndTime()
        );
    }
}