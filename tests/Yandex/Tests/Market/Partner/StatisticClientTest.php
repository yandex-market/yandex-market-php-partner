<?php

namespace Yandex\Tests\Market;

use GuzzleHttp\Psr7\Response;
use Yandex\Market\Partner\Clients\StatisticClient;
use Yandex\Market\Partner\Models\Stats;
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
class StatisticClientTest extends TestCase
{
    protected $fixturesFolder = 'fixtures';

    public function testGetMain()
    {
        $json = file_get_contents(__DIR__ . '/' . $this->fixturesFolder . '/statisticMain.json');
        $jsonObj = json_decode($json);
        $response = new Response(200, [], \GuzzleHttp\Psr7\stream_for($json));

        $mock = $this->getMockBuilder(StatisticClient::class)
            ->setMethods(['sendRequest'])
            ->getMock();
        $mock->expects($this->any())
            ->method('sendRequest')
            ->will($this->returnValue($response));

        $stats = $mock->getMain(2222);

        $this->assertValues($stats, $jsonObj);
    }

    private function assertValues(Stats $statsResponse, \stdClass $jsonObj)
    {
        $statCount = $statsResponse->count();
        $stat = $statsResponse->current();

        for ($i = 0; $i < $statCount; $i++) {
            if (isset($jsonObj->mainStats[$i]->detailedStats)) {
                $detailedStats = $stat->getDetailedStats();
                if ($detailedStats === null) {
                    return;
                }

                $detailedStatsCount = $detailedStats->count();
                $detailedStat = $detailedStats->current();

                for ($y = 0; $y < $detailedStatsCount; $y++) {
                    if (isset($jsonObj->mainStats[$i]->detailedStats[$y]->spending))
                        $this->assertEquals(
                            $jsonObj->mainStats[$i]->detailedStats[$y]->spending,
                            $detailedStat->getSpending()
                        );
                }
                if (isset($jsonObj->mainStats[$i]->detailedStats[$y]->show)) {
                    $this->assertEquals(
                        $jsonObj->mainStats[$i]->detailedStats[$y]->shows,
                        $detailedStat->getShows()
                    );
                }
                if (isset($jsonObj->mainStats[$i]->detailedStats[$y]->clicks)) {
                    $this->assertEquals(
                        $jsonObj->mainStats[$i]->detailedStats[$y]->clicks,
                        $detailedStat->getClicks()
                    );
                }
                if (isset($jsonObj->mainStats[$i]->detailedStats[$y]->type)) {
                    $this->assertEquals(
                        $jsonObj->mainStats[$i]->detailedStats[$y]->type,
                        $detailedStat->getType()
                    );
                }

                $detailedStat = $detailedStats->next();
            }
        }

        $stat = $statsResponse->next();
    }


    public function testGetDaily()
    {
        $json = file_get_contents(__DIR__ . '/' . $this->fixturesFolder . '/statisticDaily.json');
        $jsonObj = json_decode($json);
        $response = new Response(200, [], \GuzzleHttp\Psr7\stream_for($json));

        $mock = $this->getMockBuilder(StatisticClient::class)
            ->setMethods(['sendRequest'])
            ->getMock();
        $mock->expects($this->any())
            ->method('sendRequest')
            ->will($this->returnValue($response));

        $stats = $mock->getDaily(2222);

        $this->assertValues($stats, $jsonObj);
    }

    public function testGetWeekly()
    {
        $json = file_get_contents(__DIR__ . '/' . $this->fixturesFolder . '/statisticWeekly.json');
        $jsonObj = json_decode($json);
        $response = new Response(200, [], \GuzzleHttp\Psr7\stream_for($json));

        $mock = $this->getMockBuilder(StatisticClient::class)
            ->setMethods(['sendRequest'])
            ->getMock();
        $mock->expects($this->any())
            ->method('sendRequest')
            ->will($this->returnValue($response));

        $stats = $mock->getWeekly(2222);

        $this->assertValues($stats, $jsonObj);
    }

    public function testGetMonthly()
    {
        $json = file_get_contents(__DIR__ . '/' . $this->fixturesFolder . '/statisticMonthly.json');
        $jsonObj = json_decode($json);
        $response = new Response(200, [], \GuzzleHttp\Psr7\stream_for($json));

        $mock = $this->getMockBuilder(StatisticClient::class)
            ->setMethods(['sendRequest'])
            ->getMock();
        $mock->expects($this->any())
            ->method('sendRequest')
            ->will($this->returnValue($response));

        $stats = $mock->getMonthly(2222);

        $this->assertValues($stats, $jsonObj);
    }

    public function testGetOffersStats()
    {
        $json = file_get_contents(__DIR__ . '/' . $this->fixturesFolder . '/offersStats.json');
        $jsonObj = json_decode($json);
        $response = new Response(200, [], \GuzzleHttp\Psr7\stream_for($json));

        $mock = $this->getMockBuilder(StatisticClient::class)
            ->setMethods(['sendRequest'])
            ->getMock();
        $mock->expects($this->any())
            ->method('sendRequest')
            ->will($this->returnValue($response));

        $stats = $mock->getOffersStats(2222);


        $this->assertEquals(
            $jsonObj->offersStats->totalOffersCount,
            $stats->getTotalOffersCount()
        );
        $this->assertEquals(
            $jsonObj->offersStats->fromOffer,
            $stats->getFromOffer()
        );
        $this->assertEquals(
            $jsonObj->offersStats->toOffer,
            $stats->getToOffer()
        );

        $offerStats = $stats->getOfferStats();
        $offerStatsCount = $offerStats->count();

        $offerStat = $offerStats->current();

        for ($i = 0; $i < $offerStatsCount; $i++) {
            $this->assertEquals(
                $jsonObj->offersStats->offerStats[$i]->clicks,
                $offerStat->getClicks()
            );
            $this->assertEquals(
                $jsonObj->offersStats->offerStats[$i]->spending,
                $offerStat->getSpending()
            );
            $this->assertEquals(
                $jsonObj->offersStats->offerStats[$i]->offerName,
                $offerStat->getOfferName()
            );
            $this->assertEquals(
                $jsonObj->offersStats->offerStats[$i]->url,
                $offerStat->getUrl()
            );
            $this->assertEquals(
                $jsonObj->offersStats->offerStats[$i]->feedId,
                $offerStat->getFeedId()
            );
            $this->assertEquals(
                $jsonObj->offersStats->offerStats[$i]->offerId,
                $offerStat->getOfferId()
            );
        }
    }
}