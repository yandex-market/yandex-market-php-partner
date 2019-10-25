<?php

namespace Yandex\Tests\Market;

use GuzzleHttp\Psr7\Response;
use Yandex\Market\Partner\Clients\ModelClient;
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
class ModelClientTest extends TestCase
{
    protected $fixturesFolder = 'fixtures';

    function testGetModelInfo()
    {
        $json = file_get_contents(__DIR__ . '/' . $this->fixturesFolder . '/model.json');
        $jsonObj = json_decode($json);
        $response = new Response(200, [], \GuzzleHttp\Psr7\stream_for($json));

        $mock = $this->getMockBuilder(ModelClient::class)
            ->setMethods(['sendRequest'])
            ->getMock();
        $mock->expects($this->any())
            ->method('sendRequest')
            ->will($this->returnValue($response));

        $modelResponse = $mock->getModelInfo(2222);


        $currency = $modelResponse->getCurrency();
        $regionId = $modelResponse->getRegionId();
        $models = $modelResponse->getModels();

        $this->assertEquals(
            $jsonObj->currency,
            $currency
        );
        $this->assertEquals(
            $jsonObj->regionId,
            $regionId
        );

        $modelsCount = $models->count();
        $model = $models->current();

        for ($i = 0; $i < $modelsCount; $i++) {
            $this->assertEquals(
                $jsonObj->models[$i]->id,
                $model->getId()
            );
            $this->assertEquals(
                $jsonObj->models[$i]->name,
                $model->getName()
            );
            $this->assertEquals(
                $jsonObj->models[$i]->prices->avg,
                $model->getPrices()->getAvg()
            );
            $this->assertEquals(
                $jsonObj->models[$i]->prices->max,
                $model->getPrices()->getMax()
            );
            $this->assertEquals(
                $jsonObj->models[$i]->prices->min,
                $model->getPrices()->getMin()
            );
            $model = $models->next();
        }
    }

    public function testGetModelMatch()
    {
        $json = file_get_contents(__DIR__ . '/' . $this->fixturesFolder . '/modelsMatch.json');
        $jsonObj = json_decode($json);
        $response = new Response(200, [], \GuzzleHttp\Psr7\stream_for($json));

        $mock = $this->getMockBuilder(ModelClient::class)
            ->setMethods(['sendRequest'])
            ->getMock();
        $mock->expects($this->any())
            ->method('sendRequest')
            ->will($this->returnValue($response));

        $modelResponse = $mock->getModelMatch(['query' => 'Test', 'regionId' => 215]);

        $currency = $modelResponse->getCurrency();
        $regionId = $modelResponse->getRegionId();
        $models = $modelResponse->getModels();

        $this->assertEquals(
            $jsonObj->currency,
            $currency
        );
        $this->assertEquals(
            $jsonObj->regionId,
            $regionId
        );

        $modelsCount = $models->count();
        $model = $models->current();

        for ($i = 0; $i < $modelsCount; $i++) {
            $this->assertEquals(
                $jsonObj->models[$i]->id,
                $model->getId()
            );
            $this->assertEquals(
                $jsonObj->models[$i]->name,
                $model->getName()
            );
            $this->assertEquals(
                $jsonObj->models[$i]->prices->avg,
                $model->getPrices()->getAvg()
            );
            $this->assertEquals(
                $jsonObj->models[$i]->prices->max,
                $model->getPrices()->getMax()
            );
            $this->assertEquals(
                $jsonObj->models[$i]->prices->min,
                $model->getPrices()->getMin()
            );
            $model = $models->next();
        }
    }

    public function testGetModelsInfo()
    {
        $json = file_get_contents(__DIR__ . '/' . $this->fixturesFolder . '/models.json');
        $jsonObj = json_decode($json);
        $response = new Response(200, [], \GuzzleHttp\Psr7\stream_for($json));

        $mock = $this->getMockBuilder(ModelClient::class)
            ->setMethods(['sendRequest'])
            ->getMock();
        $mock->expects($this->any())
            ->method('sendRequest')
            ->will($this->returnValue($response));

        $modelResponse = $mock->getModelsInfo(['query' => 'Test', 'regionId' => 215]);

        $currency = $modelResponse->getCurrency();
        $regionId = $modelResponse->getRegionId();
        $models = $modelResponse->getModels();

        $this->assertEquals(
            $jsonObj->currency,
            $currency
        );
        $this->assertEquals(
            $jsonObj->regionId,
            $regionId
        );

        $modelsCount = $models->count();
        $model = $models->current();

        for ($i = 0; $i < $modelsCount; $i++) {
            $this->assertEquals(
                $jsonObj->models[$i]->id,
                $model->getId()
            );
            $this->assertEquals(
                $jsonObj->models[$i]->name,
                $model->getName()
            );
            $this->assertEquals(
                $jsonObj->models[$i]->prices->avg,
                $model->getPrices()->getAvg()
            );
            $this->assertEquals(
                $jsonObj->models[$i]->prices->max,
                $model->getPrices()->getMax()
            );
            $this->assertEquals(
                $jsonObj->models[$i]->prices->min,
                $model->getPrices()->getMin()
            );
            $model = $models->next();
        }
    }

    public function testGetModelOffers()
    {
        $json = file_get_contents(__DIR__ . '/' . $this->fixturesFolder . '/modelOffers.json');
        $jsonObj = json_decode($json);
        $response = new Response(200, [], \GuzzleHttp\Psr7\stream_for($json));

        $mock = $this->getMockBuilder(ModelClient::class)
            ->setMethods(['sendRequest'])
            ->getMock();
        $mock->expects($this->any())
            ->method('sendRequest')
            ->will($this->returnValue($response));

        $modelResponse = $mock->getModelOffers(2222);

        $currency = $modelResponse->getCurrency();
        $regionId = $modelResponse->getRegionId();
        $models = $modelResponse->getModels();

        $this->assertEquals(
            $jsonObj->currency,
            $currency
        );
        $this->assertEquals(
            $jsonObj->regionId,
            $regionId
        );

        $modelsCount = $models->count();
        $model = $models->current();

        for ($i = 0; $i < $modelsCount; $i++) {
            $this->assertEquals(
                $jsonObj->models[$i]->id,
                $model->getId()
            );
            $this->assertEquals(
                $jsonObj->models[$i]->offlineOffers,
                $model->getOfflineOffers()
            );
            $this->assertEquals(
                $jsonObj->models[$i]->onlineOffers,
                $model->getOnlineOffers()
            );

            $offers = $model->getOffers();
            $offersCount = $offers->count();
            $offer = $offers->current();

            for ($y = 0; $y < $offersCount; $y++) {
                $this->assertEquals(
                    $jsonObj->models[$i]->offers[$y]->name,
                    $offer->getName()
                );
                $this->assertEquals(
                    $jsonObj->models[$i]->offers[$y]->pos,
                    $offer->getPos()
                );
                $this->assertEquals(
                    $jsonObj->models[$i]->offers[$y]->price,
                    $offer->getPrice()
                );
                $this->assertEquals(
                    $jsonObj->models[$i]->offers[$y]->regionId,
                    $offer->getRegionId()
                );
                $this->assertEquals(
                    $jsonObj->models[$i]->offers[$y]->shippingCost,
                    $offer->getShippingCost()
                );
                $this->assertEquals(
                    $jsonObj->models[$i]->offers[$y]->shopName,
                    $offer->getShopName()
                );
                $this->assertEquals(
                    $jsonObj->models[$i]->offers[$y]->shopRating,
                    $offer->getShopRating()
                );

                $offer = $offers->next();
            }
        }
    }

    public function testGetModelsOffers()
    {
        $json = file_get_contents(__DIR__ . '/' . $this->fixturesFolder . '/modelsOffers.json');
        $jsonObj = json_decode($json);
        $response = new Response(200, [], \GuzzleHttp\Psr7\stream_for($json));

        $mock = $this->getMockBuilder(ModelClient::class)
            ->setMethods(['sendRequest'])
            ->getMock();
        $mock->expects($this->any())
            ->method('sendRequest')
            ->will($this->returnValue($response));

        $modelResponse = $mock->getModelsOffers(215, ['regionId' => 215]);

        $currency = $modelResponse->getCurrency();
        $regionId = $modelResponse->getRegionId();
        $prices = $modelResponse->getPrices();
        $models = $modelResponse->getModels();

        $this->assertEquals(
            $jsonObj->currency,
            $currency
        );
        $this->assertEquals(
            $jsonObj->regionId,
            $regionId
        );
        $this->assertEquals(
            $jsonObj->prices->max,
            $prices->getMax()
        );
        $this->assertEquals(
            $jsonObj->prices->min,
            $prices->getMin()
        );
        $this->assertEquals(
            $jsonObj->prices->avg,
            $prices->getAvg()
        );

        $modelsCount = $models->count();
        $model = $models->current();

        for ($i = 0; $i < $modelsCount; $i++) {
            $this->assertEquals(
                $jsonObj->models[$i]->id,
                $model->getId()
            );
            $this->assertEquals(
                $jsonObj->models[$i]->offlineOffers,
                $model->getOfflineOffers()
            );
            $this->assertEquals(
                $jsonObj->models[$i]->onlineOffers,
                $model->getOnlineOffers()
            );

            $offers = $model->getOffers();
            $offersCount = $offers->count();
            $offer = $offers->current();

            for ($y = 0; $y < $offersCount; $y++) {
                $this->assertEquals(
                    $jsonObj->models[$i]->offers[$y]->name,
                    $offer->getName()
                );
                $this->assertEquals(
                    $jsonObj->models[$i]->offers[$y]->pos,
                    $offer->getPos()
                );
                $this->assertEquals(
                    $jsonObj->models[$i]->offers[$y]->price,
                    $offer->getPrice()
                );
                $this->assertEquals(
                    $jsonObj->models[$i]->offers[$y]->regionId,
                    $offer->getRegionId()
                );
                $this->assertEquals(
                    $jsonObj->models[$i]->offers[$y]->shippingCost,
                    $offer->getShippingCost()
                );
                $this->assertEquals(
                    $jsonObj->models[$i]->offers[$y]->shopName,
                    $offer->getShopName()
                );
                $this->assertEquals(
                    $jsonObj->models[$i]->offers[$y]->shopRating,
                    $offer->getShopRating()
                );

                $offer = $offers->next();
            }
        }
    }
}