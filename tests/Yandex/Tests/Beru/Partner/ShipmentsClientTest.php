<?php

namespace Yandex\Tests\Beru\Partner;

use GuzzleHttp\Psr7\Response;
use Yandex\Tests\TestCase;
use Yandex\Beru\Partner\Clients\ShipmentsClient;

class ShipmentsClientTest extends TestCase
{
    protected $fixturesFolder = 'fixtures';

    const CAMPAIGN_ID = 123456;
    const REQUEST_ID = 789456;

    public function testCreateShipment()
    {
        $json = file_get_contents(__DIR__ . '/' . $this->fixturesFolder . '/createShipment.json');
        $jsonObj = json_decode($json);
        $response = new Response(200, [], \GuzzleHttp\Psr7\stream_for($json));

        $mock = $this->getMockBuilder(ShipmentsClient::class)
            ->setMethods(['sendRequest'])
            ->getMock();

        $mock->expects($this->any())
            ->method('sendRequest')
            ->will($this->returnValue($response));

        $shipmentResponse = $mock->createShipment(self::CAMPAIGN_ID);
        $result = $shipmentResponse->getShipmentRequest();

        $this->assertEquals($jsonObj->result->shipmentRequest->id, $result->getId());
        $this->assertEquals($jsonObj->result->shipmentRequest->type, $result->getType());
        $this->assertEquals($jsonObj->result->shipmentRequest->status, $result->getStatus());
        $this->assertEquals($jsonObj->result->shipmentRequest->requestedDate, $result->getRequestedDate());
        $this->assertEquals($jsonObj->result->shipmentRequest->updatedAt, $result->getUpdatedAt());
        $this->assertEquals($jsonObj->result->shipmentRequest->itemsTotalCount, $result->getItemsTotalCount());
        $this->assertEquals($jsonObj->result->shipmentRequest->hasShortage, $result->getHasShortage());
        $this->assertEquals($jsonObj->result->shipmentRequest->hasDefects, $result->getHasDefects());
    }

    public function testGetShipments()
    {
        $json = file_get_contents(__DIR__ . '/' . $this->fixturesFolder . '/shipmentsInfo.json');
        $jsonObj = json_decode($json);
        $response = new Response(200, [], \GuzzleHttp\Psr7\stream_for($json));

        $mock = $this->getMockBuilder(ShipmentsClient::class)
            ->setMethods(['sendRequest'])
            ->getMock();

        $mock->expects($this->any())
            ->method('sendRequest')
            ->will($this->returnValue($response));

        $shipmentResponse = $mock->getShipments(self::CAMPAIGN_ID);
        $paging = $shipmentResponse->getNextPageToken();
        $requests = $shipmentResponse->getRequests();
        $request = $requests->current();

        $this->assertEquals($jsonObj->result->paging->nextPageToken, $paging);

        for ($i = 0; $i < $requests->count(); $i++) {
            $this->assertEquals($jsonObj->result->requests[$i]->id, $request->getId());
            $this->assertEquals($jsonObj->result->requests[$i]->type, $request->getType());
            $this->assertEquals($jsonObj->result->requests[$i]->status, $request->getStatus());
            $this->assertEquals($jsonObj->result->requests[$i]->requestedDate, $request->getRequestedDate());
            $this->assertEquals($jsonObj->result->requests[$i]->updatedAt, $request->getUpdatedAt());
            $this->assertEquals($jsonObj->result->requests[$i]->itemsTotalCount, $request->getItemsTotalCount());
            $this->assertEquals($jsonObj->result->requests[$i]->hasShortage, $request->getHasShortage());
            $this->assertEquals($jsonObj->result->requests[$i]->hasDefects, $request->getHasDefects());

            $request = $requests->next();
        }
    }

    public function testGetShipment()
    {
        $json = file_get_contents(__DIR__ . '/' . $this->fixturesFolder . '/shipmentInfo.json');
        $jsonObj = json_decode($json);
        $response = new Response(200, [], \GuzzleHttp\Psr7\stream_for($json));

        $mock = $this->getMockBuilder(ShipmentsClient::class)
            ->setMethods(['sendRequest'])
            ->getMock();

        $mock->expects($this->any())
            ->method('sendRequest')
            ->will($this->returnValue($response));

        $result = $mock->getShipment(self::CAMPAIGN_ID, self::REQUEST_ID);

        $this->assertEquals($jsonObj->result->shipmentRequest->id, $result->getId());
        $this->assertEquals($jsonObj->result->shipmentRequest->type, $result->getType());
        $this->assertEquals($jsonObj->result->shipmentRequest->status, $result->getStatus());
        $this->assertEquals($jsonObj->result->shipmentRequest->requestedDate, $result->getRequestedDate());
        $this->assertEquals($jsonObj->result->shipmentRequest->updatedAt, $result->getUpdatedAt());

        $documents = $result->getDocuments();
        $document = $documents->current();
        for ($i = 0; $i < $documents->count(); $i++) {
            $this->assertEquals(
                $jsonObj->result->shipmentRequest->documents[$i]->id,
                $document->getId()
            );
            $this->assertEquals(
                $jsonObj->result->shipmentRequest->documents[$i]->createdAt,
                $document->getCreatedAt()
            );
            $this->assertEquals(
                $jsonObj->result->shipmentRequest->documents[$i]->type,
                $document->getType()
            );
            $document = $documents->next();
        }

        $statusHistory = $result->getStatusHistory();
        $status = $statusHistory->current();
        for ($i = 0; $i < $statusHistory->count(); $i++) {
            $this->assertEquals(
                $jsonObj->result->shipmentRequest->statusHistory[$i]->date,
                $status->getDate()
            );
            $this->assertEquals(
                $jsonObj->result->shipmentRequest->statusHistory[$i]->status,
                $status->getStatus()
            );

            $status = $statusHistory->next();
        }
    }

    public function testGetShipmentItems()
    {
        $json = file_get_contents(__DIR__ . '/' . $this->fixturesFolder . '/shipmentItems.json');
        $jsonObj = json_decode($json);
        $response = new Response(200, [], \GuzzleHttp\Psr7\stream_for($json));

        $mock = $this->getMockBuilder(ShipmentsClient::class)
            ->setMethods(['sendRequest'])
            ->getMock();

        $mock->expects($this->any())
            ->method('sendRequest')
            ->will($this->returnValue($response));

        $shipmentResponse = $mock->getShipmentItems(self::CAMPAIGN_ID, self::REQUEST_ID);
        $result = $shipmentResponse->getShipmentItems();
        $shipmentItems = $result->current();

        for ($i = 0; $i < $result->count(); $i++) {
            $this->assertEquals(
                $jsonObj->result->shipmentItems[$i]->shopSku,
                $shipmentItems->getShopSku()
            );
            $this->assertEquals(
                $jsonObj->result->shipmentItems[$i]->marketSku,
                $shipmentItems->getMarketSku()
            );
            $this->assertEquals(
                $jsonObj->result->shipmentItems[$i]->itemName,
                $shipmentItems->getItemName()
            );
            $this->assertEquals(
                $jsonObj->result->shipmentItems[$i]->barcodes,
                $shipmentItems->getBarcodes()
            );
            $this->assertEquals(
                $jsonObj->result->shipmentItems[$i]->count,
                $shipmentItems->getCount()
            );
            $this->assertEquals(
                $jsonObj->result->shipmentItems[$i]->factCount,
                $shipmentItems->getFactCount()
            );
            $this->assertEquals(
                $jsonObj->result->shipmentItems[$i]->defectCount,
                $shipmentItems->getDefectCount()
            );

            $shipmentItems = $result->next();
        }
    }
}
