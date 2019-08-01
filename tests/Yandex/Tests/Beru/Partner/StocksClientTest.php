<?php

namespace Yandex\Tests\Beru\Partner;

use Yandex\Tests\TestCase;
use Yandex\Beru\Partner\Clients\StocksClient;

class StocksClientTest extends TestCase
{
    protected $fixturesFolder = 'fixtures';

    public function testGetStocks()
    {
        $json = file_get_contents(__DIR__ . '/' . $this->fixturesFolder . '/stocks.json');
        $jsonObj = json_decode($json);
        $mock = new StocksClient();

        $stocksResp = $mock->getStocks($json);
        $skus = $stocksResp->getSkus();
        $warehouseId = $stocksResp->getWarehouseId();

        $this->assertEquals(
            $jsonObj->warehouseId,
            $warehouseId
        );
        $this->assertEquals(
            $jsonObj->skus,
            $skus
        );
    }
}
