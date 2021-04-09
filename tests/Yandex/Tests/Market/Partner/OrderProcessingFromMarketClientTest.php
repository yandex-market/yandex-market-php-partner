<?php

namespace Yandex\Tests\Market\Partner;

use Yandex\Market\Partner\Clients\OrderProcessingFromMarketClient;
use Yandex\Tests\TestCase;

class OrderProcessingFromMarketClientTest extends TestCase
{
    protected $fixturesFolder = 'fixtures';

    public function testGetCart()
    {
        $json = file_get_contents(__DIR__ . '/' . $this->fixturesFolder . '/getCart.json');
        $jsonObj = json_decode($json);

        $client = new OrderProcessingFromMarketClient();
        $response = $client->getCart($json);
        $cart = $response->getCart();

        $this->assertEquals($jsonObj->cart->currency, $cart->getCurrency());
        $this->assertEquals($jsonObj->cart->deliveryCurrency, $cart->getDeliveryCurrency());

        $delivery = $cart->getDelivery();
        $region = $delivery->getRegion();
        $address = $delivery->getAddress();

        $this->assertEquals($jsonObj->cart->delivery->region->id, $region->getId());
        $this->assertEquals($jsonObj->cart->delivery->region->name, $region->getName());
        $this->assertEquals($jsonObj->cart->delivery->region->type, $region->getType());
        $this->assertEquals($jsonObj->cart->delivery->region->parent->id, $region->getParent()->getId());

        $this->assertEquals($jsonObj->cart->delivery->address->postcode, $address->getPostcode());
        $this->assertEquals($jsonObj->cart->delivery->address->country, $address->getCountry());
        $this->assertEquals($jsonObj->cart->delivery->address->city, $address->getCity());
        $this->assertEquals($jsonObj->cart->delivery->address->subway, $address->getSubway());

        $items = $cart->getItems();
        $item = $items->current();

        for ($i = 0; $i < $items->count(); $i++) {
            $this->assertEquals($jsonObj->cart->items[$i]->offerId, $item->getOfferId());
            $this->assertEquals($jsonObj->cart->items[$i]->count, $item->getCount());
            $this->assertEquals($jsonObj->cart->items[$i]->offerName, $item->getOfferName());
            $this->assertEquals($jsonObj->cart->items[$i]->feedId, $item->getFeedId());
            $item = $items->next();
        }
    }

    public function testAcceptOrder()
    {
        $json = file_get_contents(__DIR__ . '/' . $this->fixturesFolder . '/acceptOrder.json');
        $jsonObj = json_decode($json);

        $client = new OrderProcessingFromMarketClient();

        $res = $client->acceptOrder($json);
        $order = $res->getOrder($json);

        $this->assertEquals($jsonObj->order->currency, $order->getCurrency());
        $this->assertEquals($jsonObj->order->fake, $order->getFake());
        $this->assertEquals($jsonObj->order->id, $order->getId());
        $this->assertEquals($jsonObj->order->paymentType, $order->getPaymentType());
        $this->assertEquals($jsonObj->order->paymentMethod, $order->getPaymentMethod());
        $this->assertEquals($jsonObj->order->taxSystem, $order->getTaxSystem());

        $delivery = $order->getDelivery();
        $region = $delivery->getRegion();
        $address = $delivery->getAddress();

        $this->assertEquals($jsonObj->order->delivery->region->id, $region->getId());
        $this->assertEquals($jsonObj->order->delivery->region->name, $region->getName());
        $this->assertEquals($jsonObj->order->delivery->region->type, $region->getType());
        $this->assertEquals($jsonObj->order->delivery->region->parent->id, $region->getParent()->getId());

        $this->assertEquals($jsonObj->order->delivery->address->postcode, $address->getPostcode());
        $this->assertEquals($jsonObj->order->delivery->address->country, $address->getCountry());
        $this->assertEquals($jsonObj->order->delivery->address->city, $address->getCity());
        $this->assertEquals($jsonObj->order->delivery->address->subway, $address->getSubway());

        $items = $order->getItems();
        $item = $items->current();

        $this->assertEquals($jsonObj->order->items[0]->offerId, $item->getOfferId());
        $this->assertEquals($jsonObj->order->items[0]->count, $item->getCount());

        $this->assertEquals($jsonObj->order->items[0]->offerId, $item->getOfferId());
        $this->assertEquals($jsonObj->order->items[0]->count, $item->getCount());

        $this->assertEquals($jsonObj->order->items[0]->promos[0]->subsidy, $item->getPromos()->current()->getSubsidy());
        $this->assertEquals($jsonObj->order->items[0]->promos[0]->type, $item->getPromos()->current()->getType());
    }

    public function testOrderStatus()
    {
        $json = file_get_contents(__DIR__ . '/' . $this->fixturesFolder . '/orderStatus.json');
        $jsonObj = json_decode($json);

        $client = new OrderProcessingFromMarketClient();

        $res = $client->orderStatus($json);
        $order = $res->getOrder($json);

        $this->assertEquals($jsonObj->order->currency, $order->getCurrency());
        $this->assertEquals($jsonObj->order->fake, $order->getFake());
        $this->assertEquals($jsonObj->order->id, $order->getId());
        $this->assertEquals($jsonObj->order->paymentType, $order->getPaymentType());
        $this->assertEquals($jsonObj->order->paymentMethod, $order->getPaymentMethod());
        $this->assertEquals($jsonObj->order->taxSystem, $order->getTaxSystem());

        $delivery = $order->getDelivery();
        $region = $delivery->getRegion();
        $address = $delivery->getAddress();

        $this->assertEquals($jsonObj->order->delivery->region->id, $region->getId());
        $this->assertEquals($jsonObj->order->delivery->region->name, $region->getName());
        $this->assertEquals($jsonObj->order->delivery->region->type, $region->getType());
        $this->assertEquals($jsonObj->order->delivery->region->parent->id, $region->getParent()->getId());

        $this->assertEquals($jsonObj->order->delivery->address->postcode, $address->getPostcode());
        $this->assertEquals($jsonObj->order->delivery->address->country, $address->getCountry());
        $this->assertEquals($jsonObj->order->delivery->address->city, $address->getCity());
        $this->assertEquals($jsonObj->order->delivery->address->subway, $address->getSubway());

        $items = $order->getItems();
        $item = $items->current();

        $this->assertEquals($jsonObj->order->items[0]->offerId, $item->getOfferId());
        $this->assertEquals($jsonObj->order->items[0]->count, $item->getCount());

        $this->assertEquals($jsonObj->order->items[0]->offerId, $item->getOfferId());
        $this->assertEquals($jsonObj->order->items[0]->count, $item->getCount());

        $this->assertEquals($jsonObj->order->items[0]->promos[0]->subsidy, $item->getPromos()->current()->getSubsidy());
        $this->assertEquals($jsonObj->order->items[0]->promos[0]->type, $item->getPromos()->current()->getType());
    }
}
