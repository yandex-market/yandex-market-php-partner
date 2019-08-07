<?php

namespace Yandex\Tests\Beru\Partner;

use GuzzleHttp\Psr7\Response;
use Yandex\Tests\TestCase;
use Yandex\Beru\Partner\Clients\RelationshipClient;

class RelationshipClientTest extends TestCase
{
    protected $fixturesFolder = 'fixtures';

    const CAMPAIGN_ID = 123456;

    public function testGetRecommendedRelationship()
    {
        $json = file_get_contents(__DIR__ . '/' . $this->fixturesFolder . '/recommendedRelationship.json');
        $jsonObj = json_decode($json);
        $response = new Response(200, [], \GuzzleHttp\Psr7\stream_for($json));

        $mock = $this->getMockBuilder(RelationshipClient::class)
            ->setMethods(['sendRequest'])
            ->getMock();

        $mock->expects($this->any())
            ->method('sendRequest')
            ->will($this->returnValue($response));

        $offers = $mock->getRecommendedRelationship(self::CAMPAIGN_ID);

        $offer = $offers->current();


        for ($i = 0; $i < $offers->count(); $i++) {
            $this->assertEquals(
                $jsonObj->result->offers[$i]->name,
                $offer->getName()
            );
            $this->assertEquals(
                $jsonObj->result->offers[$i]->category,
                $offer->getCategory()
            );
            $this->assertEquals(
                $jsonObj->result->offers[$i]->vendor,
                $offer->getVendor()
            );
            $this->assertEquals(
                $jsonObj->result->offers[$i]->price,
                $offer->getPrice()
            );
            $this->assertEquals(
                $jsonObj->result->offers[$i]->marketSku,
                $offer->getMarketSku()
            );
            $this->assertEquals(
                $jsonObj->result->offers[$i]->marketSkuName,
                $offer->getMarketSkuName()
            );
            $offer = $offers->next();
        }
    }

    public function testUpdateRelationship()
    {
        $json = file_get_contents(__DIR__ . '/' . $this->fixturesFolder . '/postResponse.json');
        $jsonObj = json_decode($json);
        $response = new Response(200, [], \GuzzleHttp\Psr7\stream_for($json));

        $mock = $this->getMockBuilder(RelationshipClient::class)
            ->setMethods(['sendRequest'])
            ->getMock();

        $mock->expects($this->any())
            ->method('sendRequest')
            ->will($this->returnValue($response));

        $priceResponse = $mock->updateRelationship(self::CAMPAIGN_ID);
        $status = $priceResponse->getStatus();

        $this->assertEquals($jsonObj->status, $status);
    }

    public function testDeleteRelationship()
    {
        $json = file_get_contents(__DIR__ . '/' . $this->fixturesFolder . '/postResponse.json');
        $jsonObj = json_decode($json);
        $response = new Response(200, [], \GuzzleHttp\Psr7\stream_for($json));

        $mock = $this->getMockBuilder(RelationshipClient::class)
            ->setMethods(['sendRequest'])
            ->getMock();

        $mock->expects($this->any())
            ->method('sendRequest')
            ->will($this->returnValue($response));

        $priceResponse = $mock->deleteRelationship(self::CAMPAIGN_ID);
        $status = $priceResponse->getStatus();

        $this->assertEquals($jsonObj->status, $status);
    }

    public function testGetActiveRelationship()
    {
        $json = file_get_contents(__DIR__ . '/' . $this->fixturesFolder . '/activeRelationship.json');
        $jsonObj = json_decode($json);
        $response = new Response(200, [], \GuzzleHttp\Psr7\stream_for($json));

        $mock = $this->getMockBuilder(RelationshipClient::class)
            ->setMethods(['sendRequest'])
            ->getMock();

        $mock->expects($this->any())
            ->method('sendRequest')
            ->will($this->returnValue($response));

        $relationshipResponse = $mock->getActiveRelationship(self::CAMPAIGN_ID);

        $offers = $relationshipResponse->getOfferMappingEntries();

        $offerMappingEntries = $offers->current();

        $paging = $relationshipResponse->getNextPageToken();
        $this->assertEquals($jsonObj->result->paging->nextPageToken, $paging);

        for ($i = 0; $i < $offers->count(); $i++) {
            $offer = $offerMappingEntries->getOffer();
            $this->assertEquals(
                $jsonObj->result->offerMappingEntries[$i]->offer->name,
                $offer->getName()
            );
            $this->assertEquals(
                $jsonObj->result->offerMappingEntries[$i]->offer->shopSku,
                $offer->getShopSku()
            );
            $this->assertEquals(
                $jsonObj->result->offerMappingEntries[$i]->offer->category,
                $offer->getCategory()
            );
            $this->assertEquals(
                $jsonObj->result->offerMappingEntries[$i]->offer->barcodes,
                $offer->getBarcodes()
            );
            $processingState = $offer->getProcessingState();
            $this->assertEquals(
                $jsonObj->result->offerMappingEntries[$i]->offer->processingState->status,
                $processingState->getStatus()
            );
            $mapping = $offerMappingEntries->getMapping();
            $this->assertEquals(
                $jsonObj->result->offerMappingEntries[$i]->mapping->marketSku,
                $mapping->getMarketSku()
            );
            $rejectedMapping = $offerMappingEntries->getRejectedMapping();
            if ($rejectedMapping) {
                $this->assertEquals(
                    $jsonObj->result->offerMappingEntries[$i]->rejectedMapping->marketSku,
                    $rejectedMapping->getMarketSku()
                );
            }

            $offerMappingEntries = $offers->next();
        }
    }
}
