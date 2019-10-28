<?php

namespace Yandex\Tests\Market;

use GuzzleHttp\Psr7\Response;
use Yandex\Market\Partner\Clients\BidClient;
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
class BidClientTest extends TestCase
{
    protected $fixturesFolder = 'fixtures';

    public function testGetBids()
    {
        $json = file_get_contents(__DIR__ . '/' . $this->fixturesFolder . '/bids.json');
        $jsonObj = json_decode($json);
        $response = new Response(200, [], \GuzzleHttp\Psr7\stream_for($json));

        $mock = $this->getMockBuilder(BidClient::class)
            ->setMethods(['sendRequest'])
            ->getMock();
        $mock->expects($this->any())
            ->method('sendRequest')
            ->will($this->returnValue($response));

        $getBids =  $mock->getBids(2222);
        $bids = $getBids->getBids(2222);
        $bidsCount = $bids->count();

        $bid = $bids->current();

        for ($i = 0; $i < $bidsCount; $i++) {
            $this->assertEquals(
                $jsonObj->result->bids[$i]->dontPullUpBids,
                $bid->getDontPullUpBids()
            );
            $this->assertEquals(
                $jsonObj->result->bids[$i]->feedId,
                $bid->getFeedId()
            );
            $this->assertEquals(
                $jsonObj->result->bids[$i]->modified,
                $bid->getModified()
            );
            $this->assertEquals(
                $jsonObj->result->bids[$i]->offerId,
                $bid->getOfferId()
            );
            $this->assertEquals(
                $jsonObj->result->bids[$i]->status,
                $bid->getStatus()
            );

            $bid = $bids->next();
        }
    }

    public function testSetBids()
    {
        $json = file_get_contents(__DIR__ . '/' . $this->fixturesFolder . '/bidsSet.json');
        $jsonObj = json_decode($json);
        $response = new Response(200, [], \GuzzleHttp\Psr7\stream_for($json));

        $mock = $this->getMockBuilder(BidClient::class)
            ->setMethods(['sendRequest'])
            ->getMock();
        $mock->expects($this->any())
            ->method('sendRequest')
            ->will($this->returnValue($response));

        $setBids = $mock->setBids(2222, ['bids' => [
            ['cbid' => 1.2, 'bid' => 1.3],
            ['offerName' => 'testOffer'],
        ]]);

        $bids = $setBids->getBids();

        $bidsCount = $bids->count();
        $bid = $bids->current();

        for ($i = 0; $i < $bidsCount; $i++) {
            if(isset($jsonObj->result->bidsSet[$i]->bid)) {
                $this->assertEquals(
                    $jsonObj->result->bidsSet[$i]->bid,
                    $bid->getBid()
                );
            }
            if(isset($jsonObj->result->bidsSet[$i]->error)) {
                $this->assertEquals(
                    $jsonObj->result->bidsSet[$i]->error,
                    $bid->getError()
                );
            }
            $this->assertEquals(
                $jsonObj->result->bidsSet[$i]->feedId,
                $bid->getFeedId()
            );
            $this->assertEquals(
                $jsonObj->result->bidsSet[$i]->offerId,
                $bid->getOfferId()
            );

            $bid = $bids->next();
        }
    }

    public function testGetRecommendedBids()
    {
        $json = file_get_contents(__DIR__ . '/' . $this->fixturesFolder . '/bidsRecommended.json');
        $jsonObj = json_decode($json);
        $response = new Response(200, [], \GuzzleHttp\Psr7\stream_for($json));

        $mock = $this->getMockBuilder(BidClient::class)
            ->setMethods(['sendRequest'])
            ->getMock();
        $mock->expects($this->any())
            ->method('sendRequest')
            ->will($this->returnValue($response));

        $getRecommendedBids = $mock->getRecommendedBids(2222);
        $recommendedBids = $getRecommendedBids->getBids();
        $recommendedCount = $recommendedBids->count();

        $bid = $recommendedBids->current();

        for ($i = 0; $i < $recommendedCount; $i++) {
            $this->assertEquals(
                $jsonObj->result->recommendations[$i]->bid,
                $bid->getBid()
            );
            $this->assertEquals(
                $jsonObj->result->recommendations[$i]->dontPullUpBids,
                $bid->getDontPullUpBids()
            );
            $this->assertEquals(
                $jsonObj->result->recommendations[$i]->feedId,
                $bid->getFeedId()
            );
            $this->assertEquals(
                $jsonObj->result->recommendations[$i]->minBid,
                $bid->getMinBid()
            );
            $this->assertEquals(
                $jsonObj->result->recommendations[$i]->offerId,
                $bid->getOfferId()
            );

            $this->assertEquals(
                $jsonObj->result->recommendations[$i]->modelCard->currentPosAll,
                $bid->getModelCard()->getCurrentPosAll()
            );
            $this->assertEquals(
                $jsonObj->result->recommendations[$i]->modelCard->currentPosTop,
                $bid->getModelCard()->getCurrentPosTop()
            );


            $posRecommendations = $jsonObj->result->recommendations[$i]->modelCard->posRecommendations;
            $posRecommendationsObj = $bid->getModelCard()->getPosRecommendations();

            $y = 0;
            foreach ($posRecommendations as $posRecommendation) {
                $this->assertEquals(
                    $posRecommendation->bid,
                    $posRecommendationsObj[$y]['bid']
                );
                $this->assertEquals(
                    $posRecommendation->pos,
                    $posRecommendationsObj[$y]['pos']
                );

                $y++;
            }

            $bid = $recommendedBids->next();
        }
    }

    public function testGetBidsSettings()
    {
        $json = file_get_contents(__DIR__ . '/' . $this->fixturesFolder . '/bidsSettings.json');
        $jsonObj = json_decode($json);
        $response = new Response(200, [], \GuzzleHttp\Psr7\stream_for($json));

        $mock = $this->getMockBuilder(BidClient::class)
            ->setMethods(['sendRequest'])
            ->getMock();
        $mock->expects($this->any())
            ->method('sendRequest')
            ->will($this->returnValue($response));

        $settings = $mock->getBidsSettings(2222);

        $this->assertEquals(
            $jsonObj->settings->autobrokerEnabled,
            $settings->getAutobrokerEnabled()
        );
        $this->assertEquals(
            $jsonObj->settings->bidsFrom,
            $settings->getBidsFrom()
        );
        $this->assertEquals(
            $jsonObj->settings->offerIdBy,
            $settings->getOfferIdBy()
        );

        $this->assertEquals(
            $jsonObj->settings->bookBids->bid,
            $settings->getBookBids()->getBid()
        );
        $this->assertEquals(
            $jsonObj->settings->bookBids->cbid,
            $settings->getBookBids()->getCbid()
        );

        $this->assertEquals(
            $jsonObj->settings->shopBids->bid,
            $settings->getShopBids()->getBid()
        );
        $this->assertEquals(
            $jsonObj->settings->shopBids->cbid,
            $settings->getShopBids()->getCbid()
        );
    }

    public function testGetPopularRecommendedBidsMarketSearch()
    {
        $json = file_get_contents(__DIR__ . '/' . $this->fixturesFolder . '/bidsMarketSearch.json');
        $jsonObj = json_decode($json);
        $response = new Response(200, [], \GuzzleHttp\Psr7\stream_for($json));

        $mock = $this->getMockBuilder(BidClient::class)
            ->setMethods(['sendRequest'])
            ->getMock();
        $mock->expects($this->any())
            ->method('sendRequest')
            ->will($this->returnValue($response));

        $getPopularRecommendedBidsMarketSearch = $mock->getPopularRecommendedBidsMarketSearch(2222);
        $settings = $getPopularRecommendedBidsMarketSearch->getBids();
        $settingsCount = $settings->count();

        $setting = $settings->current();

        for ($i = 0; $i < $settingsCount; $i++) {
            $this->assertEquals(
                $jsonObj->result->topRecommendations[$i]->bid,
                $setting->getBid()
            );
            $this->assertEquals(
                $jsonObj->result->topRecommendations[$i]->feedId,
                $setting->getFeedId()
            );
            $this->assertEquals(
                $jsonObj->result->topRecommendations[$i]->minBid,
                $setting->getMinBid()
            );
            $this->assertEquals(
                $jsonObj->result->topRecommendations[$i]->offerId,
                $setting->getOfferId()
            );
            $this->assertEquals(
                $jsonObj->result->topRecommendations[$i]->name,
                $setting->getName()
            );
            $setting = $settings->next();
        }
    }

    public function testSetRecommendationsBids()
    {
        $json = file_get_contents(__DIR__ . '/' . $this->fixturesFolder . '/setRecommendationsBids.json');
        $jsonObj = json_decode($json);
        $response = new Response(200, [], \GuzzleHttp\Psr7\stream_for($json));

        $mock = $this->getMockBuilder(BidClient::class)
            ->setMethods(['sendRequest'])
            ->getMock();
        $mock->expects($this->any())
            ->method('sendRequest')
            ->will($this->returnValue($response));

        $setBids = $mock->setRecommendationsBids(2222, ['bids' => [
            ['cbid' => 1.2, 'bid' => 1.3],
            ['offerName' => 'testOffer'],
        ]]);

        $bids = $setBids->getBids();

        $bidsCount = $bids->count();
        $bid = $bids->current();

        for ($i = 0; $i < $bidsCount; $i++) {
            if(isset($jsonObj->result->bidsSet[$i]->bid)) {
                $this->assertEquals(
                    $jsonObj->result->bidsSet[$i]->bid,
                    $bid->getBid()
                );
            }
            if(isset($jsonObj->result->bidsSet[$i]->error)) {
                $this->assertEquals(
                    $jsonObj->result->bidsSet[$i]->error,
                    $bid->getError()
                );
            }
            $this->assertEquals(
                $jsonObj->result->bidsSet[$i]->feedId,
                $bid->getFeedId()
            );
            $this->assertEquals(
                $jsonObj->result->bidsSet[$i]->offerId,
                $bid->getOfferId()
            );

            $bid = $bids->next();
        }
    }
}