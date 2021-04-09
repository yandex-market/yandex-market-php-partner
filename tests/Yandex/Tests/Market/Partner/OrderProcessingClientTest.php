<?php

namespace Yandex\Tests\Market\Partner;

use GuzzleHttp\Psr7\Response;
use Yandex\Market\Partner\Clients\OrderProcessingClient;
use Yandex\Market\Partner\Models\Buyer;
use Yandex\Market\Partner\Models\Item;
use Yandex\Market\Partner\Models\OrderInfo;
use Yandex\Market\Partner\Models\Response\GetBuyerResponse;
use Yandex\Market\Partner\Models\Response\GetDeliveryServiceResponse;
use Yandex\Market\Partner\Models\Response\GetOrderResponse;
use Yandex\Market\Partner\Models\Response\GetOrdersResponse;
use Yandex\Market\Partner\Models\Response\GetUpdateOrderResponse;
use Yandex\Market\Partner\Models\Response\TransferCisResponse;
use Yandex\Tests\TestCase;

class OrderProcessingClientTest extends TestCase
{
    protected $fixturesFolder = 'fixtures';

    const CAMPAIGN_ID = 123456;
    const ORDER_ID = 1245;
    const SHIPMENT_ID = 4579;

    public function testUpdateOrderStatus()
    {
        $json = file_get_contents(__DIR__ . '/' . $this->fixturesFolder . '/updateOrderStatus.json');
        $jsonObj = json_decode($json);
        $response = new Response(200, [], \GuzzleHttp\Psr7\stream_for($json));

        $mock = $this->getMockBuilder(OrderProcessingClient::class)
            ->setMethods(['sendRequest'])
            ->getMock();

        $mock->expects($this->any())
            ->method('sendRequest')
            ->will($this->returnValue($response));

        /** @var GetUpdateOrderResponse $orderResponse */
        $orderResponse = $mock->updateOrderStatus(self::CAMPAIGN_ID, self::ORDER_ID);
        $order = $orderResponse->getOrder();
        $this->getGeneralOrderInfo($jsonObj, $order);
        $this->getOrderDelivery($jsonObj, $order);
    }

    public function testTransferCis()
    {
        $json = file_get_contents(__DIR__ . '/' . $this->fixturesFolder . '/transferCis.json');
        $jsonObj = json_decode($json);
        $response = new Response(200, [], \GuzzleHttp\Psr7\stream_for($json));

        $mock = $this->getMockBuilder(OrderProcessingClient::class)
            ->setMethods(['sendRequest'])
            ->getMock();

        $mock->expects($this->any())
            ->method('sendRequest')
            ->will($this->returnValue($response));

        /** @var TransferCisResponse $response */
        $response = $mock->transferCis(self::CAMPAIGN_ID, self::ORDER_ID);
        $item = $response->getItems()->current();
        $this->getItems($jsonObj, $item);
    }

    public function testGetOrder()
    {
        $json = file_get_contents(__DIR__ . '/' . $this->fixturesFolder . '/getOrder.json');
        $jsonObj = json_decode($json);
        $response = new Response(200, [], \GuzzleHttp\Psr7\stream_for($json));

        $mock = $this->getMockBuilder(OrderProcessingClient::class)
            ->setMethods(['sendRequest'])
            ->getMock();

        $mock->expects($this->any())
            ->method('sendRequest')
            ->will($this->returnValue($response));

        /** @var GetOrderResponse $orderResponse */
        $orderResponse = $mock->getOrder(self::CAMPAIGN_ID, self::ORDER_ID);
        $order = $orderResponse->getOrder();
        $this->getGeneralOrderInfo($jsonObj, $order);
        $this->getOrderDelivery($jsonObj, $order);
        $this->assertEquals($jsonObj->order->items[0]->count, $order->getItems()->current()->getCount());
        $this->assertEquals($jsonObj->order->items[0]->id, $order->getItems()->current()->getId());
    }

    public function testGetOrders()
    {
        $json = file_get_contents(__DIR__ . '/' . $this->fixturesFolder . '/getOrders.json');
        $jsonObj = json_decode($json);
        $response = new Response(200, [], \GuzzleHttp\Psr7\stream_for($json));

        $mock = $this->getMockBuilder(OrderProcessingClient::class)
            ->setMethods(['sendRequest'])
            ->getMock();

        $mock->expects($this->any())
            ->method('sendRequest')
            ->will($this->returnValue($response));

        /** @var GetOrdersResponse $orderResponse */
        $orderResponse = $mock->getOrders(self::CAMPAIGN_ID, self::ORDER_ID);
        $orders = $orderResponse->getOrders();
        $order = $orders->current();
        $jsonObj->order = $jsonObj->orders[0];
        $this->getGeneralOrderInfo($jsonObj, $order);
        $this->getOrderDelivery($jsonObj, $order);
        $this->assertEquals($jsonObj->order->items[0]->count, $order->getItems()->current()->getCount());
        $this->assertEquals($jsonObj->order->items[0]->id, $order->getItems()->current()->getId());
        $this->assertEquals($jsonObj->order->items[0]->offerId, $order->getItems()->current()->getOfferId());
        $this->assertEquals($jsonObj->order->items[0]->subsidy, $order->getItems()->current()->getSubsidy());

        $this->assertEquals($jsonObj->pager->currentPage, $orderResponse->getPager()->getCurrentPage());
        $this->assertEquals($jsonObj->pager->from, $orderResponse->getPager()->getFrom());
        $this->assertEquals($jsonObj->pager->pagesCount, $orderResponse->getPager()->getPagesCount());
        $this->assertEquals($jsonObj->pager->pageSize, $orderResponse->getPager()->getPageSize());
    }

    public function testGetDeliveryService()
    {
        $json = file_get_contents(__DIR__ . '/' . $this->fixturesFolder . '/getDeliveryService.json');
        $jsonObj = json_decode($json);
        $response = new Response(200, [], \GuzzleHttp\Psr7\stream_for($json));

        $mock = $this->getMockBuilder(OrderProcessingClient::class)
            ->setMethods(['sendRequest'])
            ->getMock();

        $mock->expects($this->any())
            ->method('sendRequest')
            ->will($this->returnValue($response));

        /** @var GetDeliveryServiceResponse $orderResponse */
        $deliveryResponse = $mock->getDeliveryService();
        $deliveries = $deliveryResponse->getDeliveryService();
        $delivery = $deliveries->current();
        $this->assertEquals($jsonObj->result->deliveryService[0]->id, $delivery->getId());
        $this->assertEquals($jsonObj->result->deliveryService[0]->name, $delivery->getName());

    }

    public function testGetBuyer()
    {
        $json = file_get_contents(__DIR__ . '/' . $this->fixturesFolder . '/getBuyer.json');
        $jsonObj = json_decode($json);
        $response = new Response(200, [], \GuzzleHttp\Psr7\stream_for($json));

        $mock = $this->getMockBuilder(OrderProcessingClient::class)
            ->setMethods(['sendRequest'])
            ->getMock();

        $mock->expects($this->any())
            ->method('sendRequest')
            ->will($this->returnValue($response));

        /** @var GetBuyerResponse $buyerRes */
        $buyerRes = $mock->getBuyer(self::CAMPAIGN_ID, self::ORDER_ID);
        $buyer = $buyerRes->getResult();
        $this->getBuyer($jsonObj, $buyer);
    }

    /**
     * @param $jsonObj
     * @param OrderInfo $order
     */
    private function getGeneralOrderInfo($jsonObj, $order)
    {
        $this->assertEquals($jsonObj->order->creationDate, $order->getCreationDate());
        $this->assertEquals($jsonObj->order->currency, $order->getCurrency());
        $this->assertEquals($jsonObj->order->fake, $order->getFake());
        $this->assertEquals($jsonObj->order->id, $order->getId());
        $this->assertEquals($jsonObj->order->itemsTotal, $order->getItemsTotal());
        $this->assertEquals($jsonObj->order->paymentType, $order->getPaymentType());
        $this->assertEquals($jsonObj->order->paymentMethod, $order->getPaymentMethod());
        $this->assertEquals($jsonObj->order->status, $order->getStatus());
        $this->assertEquals($jsonObj->order->taxSystem, $order->getTaxSystem());
        $this->assertEquals($jsonObj->order->total, $order->getTotal());
    }

    /**
     * @param $jsonObj
     * @param Buyer $buyer
     */
    private function getBuyer($jsonObj, $buyer)
    {
        $this->assertEquals($jsonObj->result->id, $buyer->getId());
        $this->assertEquals($jsonObj->result->lastName, $buyer->getLastName());
        $this->assertEquals($jsonObj->result->firstName, $buyer->getFirstName());
        $this->assertEquals($jsonObj->result->middleName, $buyer->getMiddleName());
        $this->assertEquals($jsonObj->result->phone, $buyer->getPhone());
    }

    /**
     * @param $jsonObj
     * @param OrderInfo $order
     */
    private function getOrderDelivery($jsonObj, $order)
    {
        $this->assertEquals($jsonObj->order->delivery->deliveryPartnerType, $order->getDelivery()->getDeliveryPartnerType());
        $this->assertEquals($jsonObj->order->delivery->serviceName, $order->getDelivery()->getServiceName());
        $this->assertEquals($jsonObj->order->delivery->type, $order->getDelivery()->getType());
        if (isset($jsonObj->order->delivery->vat)) {
            $this->assertEquals($jsonObj->order->delivery->vat, $order->getDelivery()->getVat());
        }
        if (isset($jsonObj->order->delivery->address)) {
            $this->assertEquals($jsonObj->order->delivery->address->postcode, $order->getDelivery()->getAddress()->getPostcode());
            $this->assertEquals($jsonObj->order->delivery->address->country, $order->getDelivery()->getAddress()->getCountry());
            $this->assertEquals($jsonObj->order->delivery->address->city, $order->getDelivery()->getAddress()->getCity());
            $this->assertEquals($jsonObj->order->delivery->address->subway, $order->getDelivery()->getAddress()->getSubway());
        }
        if (isset($jsonObj->order->delivery->dates->fromDate)) {
            $this->assertEquals($jsonObj->order->delivery->dates->fromDate, $order->getDelivery()->getDates()->getFromDate());
        }
        if (isset($jsonObj->order->delivery->region->id)) {
            $this->assertEquals($jsonObj->order->delivery->region->id, $order->getDelivery()->getRegion()->getId());
        }
    }

    /**
     * @param $jsonObj
     * @param Item $item
     */
    private function getItems($jsonObj, $item)
    {
        $this->assertEquals($jsonObj->result->items[0]->id, $item->getId());
        $this->assertEquals($jsonObj->result->items[0]->vat, $item->getVat());
        $this->assertEquals($jsonObj->result->items[0]->count, $item->getCount());
        $this->assertEquals($jsonObj->result->items[0]->price, $item->getPrice());
        $this->assertEquals($jsonObj->result->items[0]->feedId, $item->getFeedId());
        $this->assertEquals($jsonObj->result->items[0]->feedCategoryId, $item->getFeedCategoryId());
        $this->assertEquals($jsonObj->result->items[0]->offerName, $item->getOfferName());
        $this->assertEquals($jsonObj->result->items[0]->offerId, $item->getOfferId());
        $this->assertEquals($jsonObj->result->items[0]->instances[0]->cis, $item->getInstances()->current()->getCis());
    }
}
