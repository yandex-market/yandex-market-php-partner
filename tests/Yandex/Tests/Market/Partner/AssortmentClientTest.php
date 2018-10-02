<?php

namespace Yandex\Tests\Market;

use GuzzleHttp\Psr7\Response;
use Yandex\Market\Partner\Clients\AssortmentClient;
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
class AssortmentClientTest extends TestCase
{
    protected $fixturesFolder = 'fixtures';

    function testGetOffers()
    {
        $json = file_get_contents(__DIR__ . '/' . $this->fixturesFolder . '/offers.json');
        $jsonObj = json_decode($json);
        $response = new Response(200, [], \GuzzleHttp\Psr7\stream_for($json));

        $mock = $this->getMockBuilder(AssortmentClient::class)
            ->setMethods(['sendRequest'])
            ->getMock();
        $mock->expects($this->any())
            ->method('sendRequest')
            ->will($this->returnValue($response));

        $offerResponse = $mock->getOffers(2222);
        $offers = $offerResponse->getOffers();

        foreach ($offers as $offer) {
            $this->assertEquals(
                $jsonObj->offers[0]->bid,
                $offer->getBid()
            );
            $this->assertEquals(
                $jsonObj->offers[0]->cbid,
                $offer->getCbid()
            );
            $this->assertEquals(
                $jsonObj->offers[0]->currency,
                $offer->getCurrency()
            );
            $this->assertEquals(
                $jsonObj->offers[0]->discount,
                $offer->getDiscount()
            );
            $this->assertEquals(
                $jsonObj->offers[0]->feedId,
                $offer->getFeedId()
            );
            $this->assertEquals(
                $jsonObj->offers[0]->id,
                $offer->getId()
            );
            $this->assertEquals(
                $jsonObj->offers[0]->marketCategoryId,
                $offer->getMarketCategoryId()
            );
            $this->assertEquals(
                $jsonObj->offers[0]->modelId,
                $offer->getModelId()
            );
            $this->assertEquals(
                $jsonObj->offers[0]->preDiscountPrice,
                $offer->getPreDiscountPrice()
            );
            $this->assertEquals(
                $jsonObj->offers[0]->price,
                $offer->getPrice()
            );
            $this->assertEquals(
                $jsonObj->offers[0]->shopCategoryId,
                $offer->getShopCategoryId()
            );
            $this->assertEquals(
                $jsonObj->offers[0]->name,
                $offer->getName()
            );
            $this->assertEquals(
                $jsonObj->offers[0]->url,
                $offer->getUrl()
            );

            /* Pager test */
            $pager = $offerResponse->getPager();

            $this->assertEquals(
                $jsonObj->pager->currentPage,
                $pager->getCurrentPage()
            );
            $this->assertEquals(
                $jsonObj->pager->to,
                $pager->getTo()
            );
            $this->assertEquals(
                $jsonObj->pager->total,
                $pager->getTotal()
            );
            $this->assertEquals(
                $jsonObj->pager->from,
                $pager->getFrom()
            );
            $this->assertEquals(
                $jsonObj->pager->pagesCount,
                $pager->getPagesCount()
            );
            $this->assertEquals(
                $jsonObj->pager->pageSize,
                $pager->getPageSize()
            );
        }
    }

    public function testGetAllOffers()
    {
        $json = file_get_contents(__DIR__ . '/' . $this->fixturesFolder . '/offersAll.json');
        $jsonObj = json_decode($json);
        $response = new Response(200, [], \GuzzleHttp\Psr7\stream_for($json));

        $mock = $this->getMockBuilder(AssortmentClient::class)
            ->setMethods(['sendRequest'])
            ->getMock();
        $mock->expects($this->any())
            ->method('sendRequest')
            ->will($this->returnValue($response));

        $offers = $mock->getAllOffers(2222);

        foreach ($offers as $offer) {
            $this->assertEquals(
                $jsonObj->offers[0]->bid,
                $offer->getBid()
            );
            $this->assertEquals(
                $jsonObj->offers[0]->cbid,
                $offer->getCbid()
            );
            $this->assertEquals(
                $jsonObj->offers[0]->currency,
                $offer->getCurrency()
            );
            $this->assertEquals(
                $jsonObj->offers[0]->discount,
                $offer->getDiscount()
            );
            $this->assertEquals(
                $jsonObj->offers[0]->feedId,
                $offer->getFeedId()
            );
            $this->assertEquals(
                $jsonObj->offers[0]->id,
                $offer->getId()
            );
            $this->assertEquals(
                $jsonObj->offers[0]->marketCategoryId,
                $offer->getMarketCategoryId()
            );
            $this->assertEquals(
                $jsonObj->offers[0]->modelId,
                $offer->getModelId()
            );
            $this->assertEquals(
                $jsonObj->offers[0]->preDiscountPrice,
                $offer->getPreDiscountPrice()
            );
            $this->assertEquals(
                $jsonObj->offers[0]->price,
                $offer->getPrice()
            );
            $this->assertEquals(
                $jsonObj->offers[0]->shopCategoryId,
                $offer->getShopCategoryId()
            );
            $this->assertEquals(
                $jsonObj->offers[0]->name,
                $offer->getName()
            );
            $this->assertEquals(
                $jsonObj->offers[0]->url,
                $offer->getUrl()
            );
        }
    }

    public function testGetFeeds()
    {
        $json = file_get_contents(__DIR__ . '/' . $this->fixturesFolder . '/feeds.json');
        $jsonObj = json_decode($json);
        $response = new Response(200, [], \GuzzleHttp\Psr7\stream_for($json));

        $mock = $this->getMockBuilder(AssortmentClient::class)
            ->setMethods(['sendRequest'])
            ->getMock();
        $mock->expects($this->any())
            ->method('sendRequest')
            ->will($this->returnValue($response));

        $feeds = $mock->getFeeds(2222);
        $feedsCount = $feeds->count();

        $feed = $feeds->current();
        for ($i = 0; $i < $feedsCount; $i++) {
            $this->assertEquals(
                $jsonObj->feeds[$i]->id,
                $feed->getId()
            );
            $this->assertEquals(
                $jsonObj->feeds[$i]->login,
                $feed->getLogin()
            );
            $this->assertEquals(
                $jsonObj->feeds[$i]->password,
                $feed->getPassword()
            );
            $this->assertEquals(
                $jsonObj->feeds[$i]->url,
                $feed->getUrl()
            );
            if (isset($jsonObj->feeds[$i]->content->error)) {
                $this->assertEquals(
                    $jsonObj->feeds[$i]->content->error->type,
                    $feed->getContent()->getError()->getType()
                );
            }
            $this->assertEquals(
                $jsonObj->feeds[$i]->content->status,
                $feed->getContent()->getStatus()
            );
            $this->assertEquals(
                $jsonObj->feeds[$i]->download->status,
                $feed->getDownload()->getStatus()
            );
            $this->assertEquals(
                $jsonObj->feeds[$i]->placement->totalOffersCount,
                $feed->getPlacement()->getTotalOffersCount()
            );
            $this->assertEquals(
                $jsonObj->feeds[$i]->publication->status,
                $feed->getPublication()->getStatus()
            );

            if (isset($jsonObj->feeds[$i]->publication->full)) {
                $this->assertEquals(
                    $jsonObj->feeds[$i]->publication->full->fileTime,
                    $feed->getPublication()->getFull()->getFileTime()
                );
                $this->assertEquals(
                    $jsonObj->feeds[$i]->publication->full->publishedTime,
                    $feed->getPublication()->getFull()->getPublishedTime()
                );
            }

            if (isset($jsonObj->feeds[$i]->publication->fupriceAndStockUpdatell)) {
                $this->assertEquals(
                    $jsonObj->feeds[$i]->publication->priceAndStockUpdate->fileTime,
                    $feed->getPublication()->getPriceAndStockUpdate()->getFileTime()
                );
                $this->assertEquals(
                    $jsonObj->feeds[$i]->publication->priceAndStockUpdate->publishedTime,
                    $feed->getPublication()->getPriceAndStockUpdate()->getPublishedTime()
                );
            }


            $feed = $feeds->next();
        }
    }

    public function testGetFeed()
    {
        $json = file_get_contents(__DIR__ . '/' . $this->fixturesFolder . '/feed.json');
        $jsonObj = json_decode($json);
        $response = new Response(200, [], \GuzzleHttp\Psr7\stream_for($json));

        $mock = $this->getMockBuilder(AssortmentClient::class)
            ->setMethods(['sendRequest'])
            ->getMock();
        $mock->expects($this->any())
            ->method('sendRequest')
            ->will($this->returnValue($response));

        $feed = $mock->getFeed(2222, 1234);

        $this->assertEquals(
            $jsonObj->feed->id,
            $feed->getId()
        );
        $this->assertEquals(
            $jsonObj->feed->login,
            $feed->getLogin()
        );
        $this->assertEquals(
            $jsonObj->feed->password,
            $feed->getPassword()
        );
        $this->assertEquals(
            $jsonObj->feed->url,
            $feed->getUrl()
        );
        if (isset($jsonObj->feed->content->error)) {
            $this->assertEquals(
                $jsonObj->feed->content->error->type,
                $feed->getContent()->getError()->getType()
            );
        }
        $this->assertEquals(
            $jsonObj->feed->content->status,
            $feed->getContent()->getStatus()
        );

        $this->assertEquals(
            $jsonObj->feed->download->status,
            $feed->getDownload()->getStatus()
        );
        $this->assertEquals(
            $jsonObj->feed->placement->totalOffersCount,
            $feed->getPlacement()->getTotalOffersCount()
        );
        $this->assertEquals(
            $jsonObj->feed->publication->status,
            $feed->getPublication()->getStatus()
        );

        if (isset($jsonObj->feed->publication->full)) {
            $this->assertEquals(
                $jsonObj->feed->publication->full->fileTime,
                $feed->getPublication()->getFull()->getFileTime()
            );
            $this->assertEquals(
                $jsonObj->feed->publication->full->publishedTime,
                $feed->getPublication()->getFull()->getPublishedTime()
            );
        }

        if (isset($jsonObj->feed->publication->fupriceAndStockUpdatell)) {
            $this->assertEquals(
                $jsonObj->feed->publication->priceAndStockUpdate->fileTime,
                $feed->getPublication()->getPriceAndStockUpdate()->getFileTime()
            );
            $this->assertEquals(
                $jsonObj->feed->publication->priceAndStockUpdate->publishedTime,
                $feed->getPublication()->getPriceAndStockUpdate()->getPublishedTime()
            );
        }
    }

    public function testGetCampaignCategories()
    {
        $json = file_get_contents(__DIR__ . '/' . $this->fixturesFolder . '/campaignCategories.json');
        $jsonObj = json_decode($json);
        $response = new Response(200, [], \GuzzleHttp\Psr7\stream_for($json));

        $mock = $this->getMockBuilder(AssortmentClient::class)
            ->setMethods(['sendRequest'])
            ->getMock();
        $mock->expects($this->any())
            ->method('sendRequest')
            ->will($this->returnValue($response));

        $categoriesResponse = $mock->getCampaignCategories(2222);

        /* Pager test */
        $pager = $categoriesResponse->getPager();

        $this->assertEquals(
            $jsonObj->pager->currentPage,
            $pager->getCurrentPage()
        );
        $this->assertEquals(
            $jsonObj->pager->to,
            $pager->getTo()
        );
        $this->assertEquals(
            $jsonObj->pager->total,
            $pager->getTotal()
        );
        $this->assertEquals(
            $jsonObj->pager->from,
            $pager->getFrom()
        );
        $this->assertEquals(
            $jsonObj->pager->pagesCount,
            $pager->getPagesCount()
        );
        $this->assertEquals(
            $jsonObj->pager->pageSize,
            $pager->getPageSize()
        );

        /* Categories test */
        $categories = $categoriesResponse->getCategories();
        $categoriesCount = $categories->count();

        $category = $categories->current();
        for ($i = 0; $i < $categoriesCount; $i++) {
            $this->assertEquals(
                $jsonObj->categories[$i]->id,
                $category->getId()
            );
            $this->assertEquals(
                $jsonObj->categories[$i]->feedId,
                $category->getFeedId()
            );
            $this->assertEquals(
                $jsonObj->categories[$i]->name,
                $category->getName()
            );

            $category = $categories->next();
        }
    }

    public function testGetFeedCategories()
    {
        $json = file_get_contents(__DIR__ . '/' . $this->fixturesFolder . '/feedCategories.json');
        $jsonObj = json_decode($json);
        $response = new Response(200, [], \GuzzleHttp\Psr7\stream_for($json));

        $mock = $this->getMockBuilder(AssortmentClient::class)
            ->setMethods(['sendRequest'])
            ->getMock();
        $mock->expects($this->any())
            ->method('sendRequest')
            ->will($this->returnValue($response));

        $categories = $mock->getFeedCategories(2222, 1234);

        $categoryCount = $categories->count();

        $category = $categories->current();
        for ($i = 0; $i < $categoryCount; $i++) {

            $this->assertEquals(
                $jsonObj->categories[$i]->name,
                $category->getName()
            );

            $this->assertEquals(
                $jsonObj->categories[$i]->id,
                $category->getId()
            );

            $this->assertEquals(
                $jsonObj->categories[$i]->feedId,
                $category->getFeedId()
            );

            $category = $categories->next();
        }
    }

    public function testGetIndexLogs()
    {
        $json = file_get_contents(__DIR__ . '/' . $this->fixturesFolder . '/feedIndexLog.json');
        $jsonObj = json_decode($json);
        $response = new Response(200, [], \GuzzleHttp\Psr7\stream_for($json));

        $mock = $this->getMockBuilder(AssortmentClient::class)
            ->setMethods(['sendRequest'])
            ->getMock();
        $mock->expects($this->any())
            ->method('sendRequest')
            ->will($this->returnValue($response));

        $indexLogsResponse = $mock->getIndexLogs(2222, 1234);

        $this->assertEquals(
            $jsonObj->status,
            $indexLogsResponse->getStatus()
        );

        $log = $indexLogsResponse->getResult();

        $this->assertEquals(
            $jsonObj->result->feed->id,
            $log->getFeedId()
        );

        $records = $log->getIndexLogRecords();
        $recordCount = $records->count();

        $record = $records->current();

        for ($i = 0; $i < $recordCount; $i++) {
            $this->assertEquals(
                $jsonObj->result->indexLogRecords[$i]->downloadTime,
                $record->getDownloadTime()
            );
            $this->assertEquals(
                $jsonObj->result->indexLogRecords[$i]->fileTime,
                $record->getFileTime()
            );
            $this->assertEquals(
                $jsonObj->result->indexLogRecords[$i]->generationId,
                $record->getGenerationId()
            );
            $this->assertEquals(
                $jsonObj->result->indexLogRecords[$i]->indexType,
                $record->getIndexType()
            );
            $this->assertEquals(
                $jsonObj->result->indexLogRecords[$i]->publishedTime,
                $record->getPublishedTime()
            );
            $this->assertEquals(
                $jsonObj->result->indexLogRecords[$i]->status,
                $record->getStatus()
            );

            if (isset($jsonObj->result->indexLogRecords[$i]->offers)) {
                $this->assertEquals(
                    $jsonObj->result->indexLogRecords[$i]->offers->rejectedCount,
                    $record->getOffers()->getRejectedCount()
                );
                $this->assertEquals(
                    $jsonObj->result->indexLogRecords[$i]->offers->totalCount,
                    $record->getOffers()->getTotalCount()
                );
            }

            if (isset($jsonObj->result->indexLogRecords[$i]->error)) {
                $this->assertEquals(
                    $jsonObj->result->indexLogRecords[$i]->error->type,
                    $record->getError()->getType()
                );
                $this->assertEquals(
                    $jsonObj->result->indexLogRecords[$i]->error->description,
                    $record->getError()->getDescription()
                );
            }

            $record = $records->next();
        }
    }

    public function testSetFeedParams()
    {
        $json = file_get_contents(__DIR__ . '/' . $this->fixturesFolder . '/postResponse.json');
        $jsonObj = json_decode($json);
        $response = new Response(200, [], \GuzzleHttp\Psr7\stream_for($json));

        $mock = $this->getMockBuilder(AssortmentClient::class)
            ->setMethods(['sendRequest'])
            ->getMock();
        $mock->expects($this->any())
            ->method('sendRequest')
            ->will($this->returnValue($response));

        $postResponse = $mock->setFeedParams(2222, 1234, ['test' => true]);

        $this->assertEquals(
            $jsonObj->status,
            $postResponse->getStatus()
        );
    }

    public function testRefreshFeed()
    {
        $json = file_get_contents(__DIR__ . '/' . $this->fixturesFolder . '/postResponse.json');
        $jsonObj = json_decode($json);
        $response = new Response(200, [], \GuzzleHttp\Psr7\stream_for($json));

        $mock = $this->getMockBuilder(AssortmentClient::class)
            ->setMethods(['sendRequest'])
            ->getMock();
        $mock->expects($this->any())
            ->method('sendRequest')
            ->will($this->returnValue($response));

        $postResponse = $mock->refreshFeed(2222, 1234);

        $this->assertEquals(
            $jsonObj->status,
            $postResponse->getStatus()
        );
    }
}