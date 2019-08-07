# PHP-библиотека партнерского API Яндекс.Маркета

С помощью [партнерского API Яндекс.Маркета](https://tech.yandex.ru/market/partner/doc/dg/concepts/about-docpage/) внешние приложения могут получать сведения о своих магазинах и предложениях и управлять ими. Библиотека написана на языке PHP и содержит методы для работы с партнерским API. 

* [Требования](#Требования)
* [Лицензия и условия использования](#Лицензия-и-условия-использования)
* [Установка](#Установка)
* [Пример использования](#Пример-использования)

## Требования

* PHP 5.6 или выше.
* Зарегистрированный магазин на Яндекс.Маркете. 
* Зарегистрированное приложение с авторизационным токеном. 
  
Подробнее см. раздел [С чего начать](https://github.com/yandex-market/yandex-market-php-partner/wiki/С-чего-начать) в Wiki.

## Лицензия и условия использования

Библиотека распространяется по [лицензии MIT](LICENSE.txt).

Использование партнерского API регулируется [пользовательским соглашением](https://yandex.ru/legal/market_api_partner/).

## Установка

Библиотека устанавливается с помощью пакетного менеджера [Composer](https://getcomposer.org).

1. Добавьте библиотеку в файл `composer.json` вашего проекта:

   ```json
   {
       "require": {
           "yandex-market/yandex-market-php-partner": "*"
       }
   }
   ```

2. Включите автозагрузчик Composer в код проекта:

   ```php
   require __DIR__ . '/vendor/autoload.php';
   ```   

## Пример использования

Выведем на экран список всех магазинов пользователя Яндекса, на которого зарегистрировано приложение:

```php
// Указываем авторизационные данные
$clientId = '9876543210fedcbaabcdef0123456789';
$token = '01234567-89ab-cdef-fedc-ba9876543210';

// Создаем экземпляр клиента с базовыми методами
$baseClient = new \Yandex\Market\Partner\Clients\BaseClient($clientId, $token);

// Магазины возвращаются постранично
$pageNumber = 0;
do {
    $pageNumber++;
    
    // Получаем страницу магазинов с номером pageNumber
    $campaignsObject = $baseClient->getCampaigns(['page' => $pageNumber,]);
    // Получаем итератор по магазинам на странице
    $campaignsPage = $campaignsObject->getCampaigns();

    // Получаем количество магазинов на странице
    $campaignsCount = $campaignsPage->count();

    // Получаем первый магазин
    $campaign = $campaignsPage->current();
    // Печатаем идентификатор и URL магазина, затем переходим к следующему    
    for ($i = 0; $i < $campaignsCount; $i++) {
        echo 'ID: ' . $campaign->getId();
        echo 'Domain: ' . $campaign->getDomain();        
        $campaign = $campaignsPage->next();
    }
    
    // Получаем информацию о страницах. Возвращаемое количество страниц может увеличиваться 
    // по мере увеличения номера страницы. Последняя страница будет достигнута, 
    // когда вернется количество страниц, равное номеру текущей страницы    
    $campaignsTotalPages = $campaignsObject->getPager()->getPagesCount();
} while ($pageNumber != $campaignsTotalPages);    
```

Подробнее см. [Wiki](https://github.com/yandex-market/yandex-market-php-partner/wiki) и [документацию партнерского API](https://tech.yandex.ru/market/partner/doc/dg/concepts/about-docpage/).   

## Примеры использования php-библиотеки партнерского API Яндекс.Беру

* [Методы для управления показом товаров](#Методы-для-управления-показом-товаров)
* [Методы для управления ценами на товары](#Методы-для-управления-ценами-на-товары)
* [Методы для управления связями между товарами на Беру и вашими](#Методы-для-управления-связями-между-товарами-на-Беру-и-вашими)
* [Методы для обработки заказов](#Методы-для-обработки-заказов)
* [Методы для получения информации об остатках товаров](#Методы-для-получения-информации-об-остатках-товаров)
* [Методы для управление поставками](#Методы-для-управление-поставками)

#### Методы для управления показом товаров

##### Информация о скрытых товарах
```php
$hiddenOffersClient = new \Yandex\Beru\Partner\Clients\HiddenOffersClient($clientId, $token);
// Получаем список скрытых товаров магазина
$campaignId = 125874;
$getInfo = $hiddenOffersClient->getInfo($campaignId);
// Получаем общее количество скрытых товаров магазина
$total = $getInfo->getTotal();
//Получаем идентификатор следующей страницы результатов
$page = $getInfo->getNextPageToken();
//Получаем список скрытых товаров
$hiddenOffers = $getInfo->getHiddenOffers();
//Выводим информацию о скрытом товаре
foreach ($hiddenOffers as $hiddenOffer) {
    echo "Comment: " . $hiddenOffer->getComment();
    echo "MarketSku: " . $hiddenOffer->getMarkerSku();
    echo "TtlInHours: " . $hiddenOffer->getTtlInHours();
}
```
Подробнее см. в [документации API.](https://yandex.ru/dev/market/partner-marketplace-cd/doc/dg/reference/get-campaigns-id-hidden-offers-docpage/)

##### Скрытие товаров и настройки скрытия
```php
$hiddenOffersClient = new \Yandex\Beru\Partner\Clients\HiddenOffersClient($clientId, $token);
$campaignId = 125874;
// Передаем список товаров, которые нужно скрыть.
$hideOffers = $hiddenOffersClient->hideOffers($campaignId, ["hiddenOffers" => [
    [
        "marketSku" => 100246054184,
        // устанавливаем новые или обновляем старые значения параметров comment и ttlInHours
        "comment" => "Комментарий магазина",
        "ttlInHours" => 2
    ]
]]);
```
Подробнее см. в [документации API.](https://yandex.ru/dev/market/partner-marketplace-cd/doc/dg/reference/post-campaigns-id-hidden-offers-docpage/)

##### Возобновление показа товаров
```php
$hiddenOffersClient = new \Yandex\Beru\Partner\Clients\HiddenOffersClient($clientId, $token);
$campaignId = 125874;
// Возобновляем показ товаров магазина на Беру, скрытых через партнерский API, передавая список скрытых товаров
$showOffers = $hiddenOffersClient->showOffers($campaignId, ["hiddenOffers" => [
    [
        "marketSku" => 100246054184,
    ]
]]);
```
Подробнее см. в [документации API.](https://yandex.ru/dev/market/partner-marketplace-cd/doc/dg/reference/delete-campaigns-id-hidden-offers-docpage/)

#### Методы для управления ценами на товары

##### Рекомендованные цены на товары
```php
$priceClient = new \Yandex\Beru\Partner\Clients\PriceClient($clientId, $token);
$campaignId = 125874;
// Получаем список товаров с рекомендованными ценами
$offers = $priceClient->getRecommendedPrices($campaignId, [ "offers" =>
    // Передаем список товаров, для которых хотим получить рекомендованную цену 
    [
        [
            'marketSku' => 100246054184,
        ],
        [
            'marketSku' => 1039521,
        ],
    ]
]);
// Получаем информацию о первом товаре
$offer = $offers->current();
foreach ($offers as $offer) {
    echo 'MarketSku: ' . $offer->getMarketSku();
    // Получаем рекомендованные цены на товар
    $pricesSuggestion = $offer->getPriceSuggestion();
    foreach ($pricesSuggestion as $priceSuggestion) {
        echo 'Type: ' . $priceSuggestion->getType();
        echo 'Price: ' . $priceSuggestion->getPrice();
        echo 'Start of promotion ' . $priceSuggestion->getPeriod()->getStart();
        echo 'End of promotion ' . $priceSuggestion->getPeriod()->getEnd();
    }
}
```
Подробнее см. в [документации API.](https://yandex.ru/dev/market/partner-marketplace-cd/doc/dg/reference/post-campaigns-id-offer-prices-suggestions-docpage/)

##### Установка цен на товары
```php
$priceClient = new \Yandex\Beru\Partner\Clients\PriceClient($clientId, $token);
$campaignId = 125874;
// Устанавливаем цены на товар, передавая в параметрах, товары для которых нужно установить цену
$priceUpdate = $priceClient->updatePrices($campaignId,  [
    "offers" => [
          [
            'marketSku' => 100246054184,
            'price' => [
                "currencyId" => "RUR",
                 "value" => 2935.00,
                 "discountBase" => 3209.00
            ],
        ],
    ]
]);
```
Подробнее см. в [документации API.](https://yandex.ru/dev/market/partner-marketplace-cd/doc/dg/reference/post-campaigns-id-offer-prices-updates-docpage/)

##### Удаление всех цен, установленных через API
```php
$priceClient = new \Yandex\Beru\Partner\Clients\PriceClient($clientId, $token);
$campaignId = 125874;
// Удаляем все цены на товары, установленные через API
$deletePrices = $priceClient->deletePrices($campaignId);
```
Подробнее см. в [документации API.](https://yandex.ru/dev/market/partner-marketplace-cd/doc/dg/reference/post-campaigns-id-offer-prices-removals-docpage/)

##### Список цен, установленных через API
```php
$priceClient = new \Yandex\Beru\Partner\Clients\PriceClient($clientId, $token);
$campaignId = 125874;
// Получаем список цен на товары, установленных через партнерский API 
$getOffersPrices = $priceClient->getOffersPrices($campaignId);
// Получаем количество всех цен магазина, измененных через API.
$total = $getOffersPrices->getTotal();
// Получаем идентификатор следующей страницы результатов
$page = $getOffersPrices->getNextPageToken();
// Получаем список предложений с ценами, измененными через API
$offers = $getOffersPrices->getOffers();
// Выводим описание товара
foreach ($offers as $offer) {
    echo "MarketSku " . $offer->getMarketSku();
    echo "UpdateAt " . $offer->getUpdatedAt();
    // Информация о цене на товар, установленной через API
    $price = $offer->getPrice();
    echo 'CurrencyId ' . $price->getCurrencyId();
    echo 'DiscountBase ' . $price->getDiscountBase();
    echo 'Value ' . $price->getValue();
    echo 'Vat ' . $price->getVat();
}
```
Подробнее см. в [документации API.](https://yandex.ru/dev/market/partner-marketplace-cd/doc/dg/reference/get-campaigns-id-offer-prices-docpage/)

#### Методы для управления связями между товарами на Беру и товарами из вашего каталога

##### Рекомендованные связи между товарами на Беру и товарами из вашего каталога
```php
$relationshipClient = new \Yandex\Beru\Partner\Clients\RelationshipClient($clientId, $token);
$campaignId = 125874;
// Получаем рекомендованные связи между товарами на маркетплейсе Беру и товарами из вашего каталога
$offers = $relationshipClient->getRecommendedRelationship($campaignId, [ "offers" =>
    [
        [
            "shopSku" => 110211,
        ],
        [
            "shopSku" => 122221,
        ],
    ],
]);
// Выводим информацию о списке товаров
foreach ($offers as $offer) {
    echo "Category: " . $offer->getCategory();
    echo "MarketCategoryName: " . $offer->getMarketCategoryName();
    echo "MarketSkuName: " . $offer->getMarketSkuName();
    echo "Name: " . $offer->getName();
}
```
Подробнее см. в [документации API.](https://yandex.ru/dev/market/partner-marketplace-cd/doc/dg/reference/post-campaigns-id-offer-mapping-entries-suggestions-docpage/)

##### Cоздание связей между товарами на Беру и товарами из вашего каталога
```php
$relationshipClient = new \Yandex\Beru\Partner\Clients\RelationshipClient($clientId, $token);
$campaignId = 125874;
// Создание связи
$updateRelationship = $relationshipClient->updateRelationship($campaignId, [
    "offerMappingEntries" => [
        [
            // Передаем информацию о товаре из вашего каталога
            "offer" => [
                    "shopSku" => "1102111111",
                    "name" => "Apple IPhone SE 128 GB rose gold",
                    "manufacturer" => "Филипс Консьюмер Лайфстайл Б.В.",
                    "urls" => [
                        "test.ru"
                    ],
                    "category" => "смартфоны",
                    "vendor" => "Apple",
                    "manufacturerCountries" => [
                        "Китай"
                    ],
            ],
             // Передаем информацию о товаре на Беру
            "mapping" => [
                "marketSku" => 100276231770
            ]
        ]
    ]
]);
```
Подробнее см. в [документации API.](https://yandex.ru/dev/market/partner-marketplace-cd/doc/dg/reference/post-campaigns-id-offer-mapping-entries-updates-docpage/)

##### Удаление связей между товарами на Беру и товарами из вашего каталога
В запросе должен быть либо параметр all со значением true, либо параметр offers. Запрос с обоими параметрами или без них приведет к ошибке.
```php
$relationshipClient = new \Yandex\Beru\Partner\Clients\RelationshipClient($clientId, $token);
$campaignId = 125874;
// Удаляем связь
$deleteRelationship = $relationshipClient->deleteRelationship($campaignId, [
    // Список товаров, для которых нужно удалить связи
    "offers" => [
        [
            "shopSku" => "1102111111",
        ]
    ]
]);
```
или 
```php
$relationshipClient = new \Yandex\Beru\Partner\Clients\RelationshipClient($clientId, $token);
$campaignId = 125874;
// Удаляем связь
$deleteRelationship = $relationshipClient->deleteRelationship($campaignId, [
    // Удаляет все связи
    "all" => true
]);
```

Подробнее см. в [документации API.](https://yandex.ru/dev/market/partner-marketplace-cd/doc/dg/reference/post-campaigns-id-offer-mapping-entries-purge-docpage/)

##### Список связей между товарами на Беру и товарами из вашего каталога
```php
$relationshipClient = new \Yandex\Beru\Partner\Clients\RelationshipClient($clientId, $token);
$campaignId = 125874;
// Получаем список связей между товарами на маркетплейсе Беру и товарами из вашего каталога
$getActiveRelationship = $relationshipClient->getActiveRelationship($campaignId);
// Получаем информацию о связях товаров из каталога с товарами на Беру
$offersMappingEntries = $getActiveRelationship->getOfferMappingEntries();
// Получаем идентификатор следующей страницы результатов
$paging = $getActiveRelationship->getNextPageToken();
// Выводим информацию о связях
foreach ($offersMappingEntries as $offerMappingEntries) {
    // Получаем информацию о товаре из каталога
    $offer = $offerMappingEntries->getOffer();
    echo 'Name: ' . $offer->getName();
    echo 'ShopSku: ' . $offer->getShopSku();
    echo 'Category: ' . $offer->getCategory();
    echo 'Urls: ';
    print_r($offer->getUrls());
    echo 'Barcodes: ';
    print_r($offer->getBarcodes());
    // Получаем информацию о статусе связи с товаром на Беру
    $processingState = $offer->getProcessingState();
    echo 'Status: ' . $processingState->getStatus();
    
    // Получаем информацию о действующей связи с товаром на Беру
    $mapping = $offerMappingEntries->getMapping();
    echo 'MarketSku: ' . $mapping->getMarketSku();
    echo 'CategoryId: ' . $mapping->getCategoryId();
    
    // Получаем информацию о связи с товаром на Беру, проходящей модерацию
    $awaitingModerationMapping = $offerMappingEntries->getAwaitingModerationMapping();
    // Получаем о последней связи с товаром на Беру, отклоненной на модерации
    $rejectedMapping = $offerMappingEntries->getRejectedMapping();
}
```
Подробнее см. в [документации API.](https://yandex.ru/dev/market/partner-marketplace-cd/doc/dg/reference/get-campaigns-id-offer-mapping-entries-docpage/)

#### Методы для обработки заказов

##### Запросы Беру к магазину

##### Запрос информации о товарах
Пример получаения данных на запрос **POST /cart:**
```php
$orderProcessingClientBeru = new \Yandex\Beru\Partner\Clients\OrderProcessingBeruClient();
// Получаем список товаров в корзине
$cart = $orderProcessingClientBeru->getCart($request);

// Получаем информацию о доставке
$delivery = $cart->getDelivery();
// Получаем информацию о регионе и родительском регионе
$region = $delivery->getRegion();
$parentRegion = $region->getParent();

// Получаем товары в корзине
$items = $cart->getItems();
foreach ($items as $item) {
    print_r($item->getCount());
    print_r($item->getOfferId());
}
```
Подробнее см. в [документации API.](https://yandex.ru/dev/market/partner-marketplace-cd/doc/dg/reference/post-cart-docpage/)

##### Передача заказа и запрос на принятие заказа
Пример получаения данных на запрос **POST /order/accept:**
```php
$orderProcessingClientBeru = new \Yandex\Beru\Partner\Clients\OrderProcessingBeruClient();
// Получаем заказ
$order = $orderProcessingClientBeru->acceptOrder($request);

// Получаем информацию о доставке
$delivery = $order->getDelivery();
// Получаем информацию о регионе и родительском регионе
$region = $delivery->getRegion();
$parentRegion = $region->getParent();

// Получаем товары в корзине
$items = $order->getItems();
foreach ($items as $item) {
   print_r($item);
}
```
Подробнее см. в [документации API.](https://yandex.ru/dev/market/partner-marketplace-cd/doc/dg/reference/post-order-accept-docpage/)

##### Уведомление о смене статуса заказа
Пример получаения данных на запрос **POST /order/status:**
```php
$orderProcessingClientBeru = new \Yandex\Beru\Partner\Clients\OrderProcessingBeruClient();
// Получаем заказ
$order = $orderProcessingClientBeru->orderStatus($request);

// Получаем информацию о доставке
$delivery = $order->getDelivery();
// Получаем информацию о регионе и родительском регионе
$region = $delivery->getRegion();
$parentRegion = $region->getParent();
// Получаем список посылок
$shipments = $delivery->getShipments();
foreach ($shipments as $shipment) {
    // Получаем список коробок в посылке
    $boxes = $shipment->getBoxes();
    print_r($boxes);
    // Получаем список товаров в коробке
    foreach ($boxes as $box) {
        $items = $box->getItems();
    }
}
```
Подробнее см. в [документации API.](https://yandex.ru/dev/market/partner-marketplace-cd/doc/dg/reference/post-order-status-docpage/)

##### Запросы Магазина к Беру

##### Справочник служб доставки
```php
$orderProcessingClient = new \Yandex\Beru\Partner\Clients\OrderProcessingClient($clientId, $token);
// Получаем список служб доставки
$deliveryServices = $orderProcessingClient->getDeliveryService();

foreach ($deliveryServices as $deliveryService) {
    echo 'Id: ' . $deliveryService->getId();
    echo 'Name: ' . $deliveryService->getName();
}
}
```
Подробнее см. в [документации API.](https://yandex.ru/dev/market/partner-marketplace-cd/doc/dg/reference/get-delivery-services-docpage/)

#### Методы для получения информации об остатках товаров

##### Запросы Беру к магазину

##### Запрос информации об остатках
Пример получаения данных на запрос **POST /stocks**
```php
$stocksClient = new \Yandex\Beru\Partner\Clients\StocksClient($clientId, $token);
$stocks = $stocksClient->getStocks($request);
// Получаем идентификатор склада
print_r($stocks->getSkus());
// Получаем список SKU товаров
print_r($stocks->getWarehouseId());
```
Подробнее см. в [документации API.](https://yandex.ru/dev/market/partner-marketplace-cd/doc/dg/reference/post-stocks-docpage/)

#### Методы для управление поставками

##### Создание заявки на поставку
```php
$shipmentsClient = new \Yandex\Beru\Partner\Clients\ShipmentsClient($clientId, $token);
$campaignId = 125874;
// Создаем заявку на поставку
$shipment = $shipmentsClient->createShipment($campaignId,  [

        "date" => "2019-10-17T07:30:00+03:00",
        "comment" => "Поставка новой партии смартфонов",
        'shipmentItems' => [
             [
                'shopSku' => 'iphone-6s-32gb-silver',
                'itemName' => 'Смартфон Apple iPhone 6S 32GB серебристый',
                'barcodes' => [ "2341dasfav23d" ],
                'count' => 12,
                'estimatedPrice' => 30000.00,
                'currency' => "RUR",
                "vat" => "VAT_18",
                "comment" => "Хрупко",
                ],
            ],
    ]
);
// Получаем информацию о поставке
$shipmentRequest = $shipment->getShipmentRequest();
```
Подробнее см. в [документации API.](https://yandex.ru/dev/market/partner-marketplace/doc/dg/reference/post-campaigns-id-shipments-requests-docpage/)

##### Информация о поставках
```php
$shipmentsClient = new \Yandex\Beru\Partner\Clients\ShipmentsClient($clientId, $token);
$campaignId = 125874;
// Получаем информацию о поставках товаров
$shipments = $shipmentsClient->getShipments($campaignId);
// Получаем список поставок
$requests = $shipments->getRequests();
// Получаем первую поставку
$request = $requests->current();
// Получаем количество поставок 
$requestsCount = $requests->count();
// Выводим id текущей поставки и переходим к следующей 
for ($i = 0; $i < $requestsCount; $i++) {
    echo 'ID: ' . $request->getId();

    $request = $requests->next();
}
```
Подробнее см. в [документации API.](https://yandex.ru/dev/market/partner-marketplace/doc/dg/reference/get-campaigns-id-shipments-requests-docpage/)

##### Информация о поставке
```php
$shipmentsClient = new \Yandex\Beru\Partner\Clients\ShipmentsClient($clientId, $token);
// Получаем информацию о поставке товаров
$campaignId = 125874;
$requestId = 45119;
$shipment = $shipmentsClient->getShipment($campaignId, $requestId);
// Получаем список документов поставки
$documents = $shipment->getDocuments();
foreach ($documents as $document) {
    echo 'Id: ' . $document->getId();
}
// Получаем историю изменений статуса поставки
$statusHistory = $shipment->getStatusHistory();
foreach ($statusHistory as $statusHistoryRow) {
    echo 'Date: ' . $statusHistoryRow->getDate();
}
```
Подробнее см. в [документации API.](https://yandex.ru/dev/market/partner-marketplace/doc/dg/reference/get-campaigns-id-shipments-requests-id-docpage/)

##### Список товаров в поставке
```php
$shipmentsClient = new \Yandex\Beru\Partner\Clients\ShipmentsClient($clientId, $token);
$campaignId = 125874;
$requestId = 45119;
$shipmentItems = $shipmentsClient->getShipmentItems($campaignId, $requestId);
// Получаем список товаров, входящих в поставку
$items = $shipmentItems->getShipmentItems();
// Получаем первый товар
$item = $items->current();
// Получаем количество товаров
$itemsCount = $items->count();
// Получаем информаицю о текущем товаре и переходим к следующему 
for ($i = 0; $i < $itemsCount; $i++)
{
    echo "ShopSku: " . $item->getShopSku();
    $item = $items->next();
}
```
Подробнее см. в [документации API.](https://yandex.ru/dev/market/partner-marketplace/doc/dg/reference/get-campaigns-id-shipments-requests-id-items-docpage/)

##### Скачивание акта приема-передачи
```php
$shipmentsClient = new \Yandex\Beru\Partner\Clients\ShipmentsClient($clientId, $token);
$campaignId = 12546;
$requestId = 56977;
$documentId = 45657;
// Получаем содержимое файла
$downloadDocument = $shipmentsClient->downloadDocument($campaignId, $requestId, $documentId);
```
Подробнее см. в [документации API.](https://yandex.ru/dev/market/partner-marketplace/doc/dg/reference/get-campaigns-id-shipments-requests-id-documents-id-docpage/)
