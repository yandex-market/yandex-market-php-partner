Ниже представлено описание и примеры запросов к API и методов, которыми они реализованы. В примерах указаны только обязательные аргументы методов. Остальные аргументы описаны в статьях о соответствующих запросах 
[технической документации API](https://tech.yandex.ru/market/partner/doc/dg/reference/all-methods-docpage/). Ссылки на статьи приведены в описаниях методов.

# Базовые методы

Методы клиента `BaseClient` возвращают информацию о магазинах на Маркете.

```php
$baseClient = new \Yandex\Market\Partner\Clients\BaseClient($clientId, $token);
```

## Магазины пользователя

Метод `getCampaigns` возвращает список магазинов пользователя на Маркете. Список совпадает со списком магазинов, отображающихся в [личном кабинете](http://partner.market.yandex.ru/) Маркета на странице «Мои магазины». Для агентских пользователей список состоит из подагентских магазинов.

```php
// Получаем объект с магазинами
$campaignsObject = $baseClient->getCampaigns();
// Получаем итератор по магазинам
$campaigns = $campaignsObject->getCampaigns();
```

Метод возвращает результаты [постранично](Основные-понятия#Постраничный-возврат).

Подробнее см. в [документации API](https://tech.yandex.ru/market/partner/doc/dg/reference/get-campaigns-docpage/).

## Информация о магазине

Метод `getCampaign` возвращает информацию о магазине.

```php
// Получаем информацию о магазине
$campaign = $baseClient->getCampaign(10001);
```

Подробнее см. в [документации API](https://tech.yandex.ru/market/partner/doc/dg/reference/get-campaigns-id-docpage/).

## Логины, связанные с магазином

Метод `getCampaignLogins` возвращает список логинов, у которых есть доступ к магазину.

```php
// Получаем список логинов
$logins = $baseClient->getCampaignLogins(10001);
```

Подробнее см. в [документации API](https://tech.yandex.ru/market/partner/doc/dg/reference/get-campaigns-id-logins-docpage/).

## Магазины, доступные логину

Метод `getCampaignsByLogin` возвращает список магазинов, к которым у логина есть доступ.

```php
// Получаем итератор по магазинам, к которым имеет доступ логин
$campaigns = $baseClient->getCampaignsByLogin('nuf-nuf');
```

Метод возвращает [итератор](Основные-понятия#Итераторы).

Подробнее см. в [документации API](https://tech.yandex.ru/market/partner/doc/dg/reference/get-campaigns-by-login-docpage/).

## Настройки магазина

Метод `getCampaignSettings` возвращает информацию о настройках магазина.

```php
// Получаем настройки магазина
$campaignSettings = $baseClient->getCampaignSettings(10001);
```

Подробнее см. в [документации API](https://tech.yandex.ru/market/partner/doc/dg/reference/get-campaigns-id-settings-docpage/).

# Настройки размещения

Методы клиента `CampaignRegionClient` возвращают информацию о настройках размещения магазинов на Маркете.

```php
$campaignRegionClient = new \Yandex\Market\Partner\Clients\CampaignRegionClient($clientId, $token);
```

## Регион магазина

Метод `getCampaigns` возвращает регион, в котором находится магазин.

```php
// Получаем регион магазина
$campaignRegion = $campaignRegionClient->getRegion(10001);
```

Подробнее см. в [документации API](https://tech.yandex.ru/market/partner/doc/dg/reference/get-campaigns-id-region-docpage/).

# Отзывы

Методы клиента `FeedbackClient` возвращают отзывы покупателей на Маркете.

```php
$feedbackClient = new \Yandex\Market\Partner\Clients\FeedbackClient($clientId, $token);
```

## Новые и обновленные отзывы о магазине

Метод `getFeedback` возвращает новые и обновленные отзывы о магазине на Маркете.

```php
/* Рекурсивная функция для печати переписки автора отзыва 
   с магазином. Объект ответа может содержать дочерние ответы */
function echoComment($comment, $level = 0) {
    $tabs = str_repeat("\t", $level);
    echo $tabs . $comment->getAuthor() . ": " . $comment->getBody();    
    $childrenComments = $comment->getChildren();
    foreach ($childrenComments as $childrenComment) {
        echoComment($childrenComment, $level + 1);
    }        

// Получаем объект с отзывами о магазине
$getFeedback = $feedbackClient->getFeedback(10774)->getResult();
// Получаем итератор по отзывам
$feedbackList = $result->getFeedbackList();
// Печатаем информацию об отзывах
foreach ($feedbackList as $feedback) { 
    echo "Author: " . $feedback->getAuthor();
    echo "Shop: " . $feedback->getShop();
    echo "Grades: " . $feedback->getGrades();
    echo "Order: " . $feedback->getOrder();
    // Получаем итератор по переписке автора отзыва с магазином    
    $comments = $feedback->getComments();
    // Печатаем ответы в переписке    
    echo "Comments:";
    foreach ($comments as $comment) {
        echoComment($comment);
    }    
}
```

Метод возвращает результаты [постранично](Основные-понятия#Постраничный-возврат).

Подробнее см. в [документации API](https://tech.yandex.ru/market/partner/doc/dg/reference/get-campaigns-id-feedback-updates-docpage/).

# Ассортимент

Методы клиента `AssortmentClient` возвращают информацию о предложениях и прайс-листах магазина, размещенных на Маркете, а также позволяют изменять настройки прайс-листов.

```php
$assortmentClient = new \Yandex\Market\Partner\Clients\AssortmentClient($clientId, $token);
```

## Предложения магазина

Метод `getOffers` возвращает информацию о предложениях магазина, размещенных на Маркете: 

* фильтровать предложения:

  ```php
  // Получаем предложения магазина в категории «Вентиляторы»
  $offersObject = $assortmentClient->getOffers(10001, 
      ['shopCategoryId' => 90565,]  // идентификатор категории, необязательный параметр
  );
  // Получаем итератор по предложениям
  $offers = $offersObject->getOffers();  
  ```

* искать предложения по заданному поисковому запросу:

  ```php
  // Ищем предложения магазина по запросу «погружной»
  $offersObject = $assortmentClient->getOffers(10001, 
      ['query' => 'погружной',]  // поисковый запрос, необязательный параметр
  );      
  // Получаем итератор по предложениям
  $offers = $offersObject->getOffers();       
  );
  ```

Метод возвращает результаты [постранично](Основные-понятия#Постраничный-возврат).

Подробнее см. в [документации API](https://tech.yandex.ru/market/partner/doc/dg/reference/get-campaigns-id-offers-docpage/).

## Все предложения магазина

Метод `getAllOffers` возвращает информацию обо всех предложениях магазина, размещенных на Маркете, в виде сегментов нефиксированного размера:

```php
// Получаем четвертый сегмент всех предложений магазина
$allOffersObject = $assortmentClient->getAllOffers(10001, 
    ['chunk' => 4,]  // номер сегмента, обязательный параметр
);
// Получаем итератор по предложениям
$allOffers = $allOffersObject->getOffers();  
```

Метод содержит в выходных данных [итератор](Основные-понятия#Итераторы).

Подробнее см. в [документации API](https://tech.yandex.ru/market/partner/doc/dg/reference/get-campaigns-id-offers-all-docpage/).

## Список прайс-листов магазина

Метод `getFeeds` возвращает список прайс-листов магазина, размещенных на Маркете, и результаты их автоматических проверок:

```php
// Получаем прайс-листы магазина
$feeds = $assortmentClient->getFeeds(10001);  
```

Метод возвращает [итератор](Основные-понятия#Итераторы).

Подробнее см. в [документации API](https://tech.yandex.ru/market/partner/doc/dg/reference/get-campaigns-id-feeds-docpage/).

## Информация о прайс-листе

Метод `getFeed` возвращает информацию о прайс-листе магазина, размещенном на Маркете, и результаты его автоматических проверок:

```php
// Получаем информацию о прайс-листе
$feed = $assortmentClient->getFeed(10001, 12345);  
```

Подробнее см. в [документации API](https://tech.yandex.ru/market/partner/doc/dg/reference/get-campaigns-id-feeds-id-docpage/).

## Категории прайс-листа

Метод `getFeedCategories` возвращает список категорий предложений из прайс-листа магазина, размещенного на Маркете:

```php
// Получаем список категорий прайс-листа
$feedCategories = $assortmentClient->getFeedCategories(10001, 12345);  
```
В ответе на запрос для каждой категории возвращается ее название, идентификатор и идентификатор родительской категории. Список сортируется по возрастанию идентификатора категории. Информация о категориях отключенных прайс-листов не предоставляется.

Метод возвращает результаты [постранично](Основные-понятия#Постраничный-возврат).

Подробнее см. в [документации API](https://tech.yandex.ru/market/partner/doc/dg/reference/get-campaigns-id-feeds-id-categories-docpage/).

## Категории магазина

Метод `getCampaignCategories` возвращает список категорий предложений из всех прайс-листов магазина, размещенных на Маркете:

```php
// Получаем список категорий магазина
$campaignCategories = $assortmentClient->getCampaignCategories(10001);  
```

В ответе на запрос для каждой категории указывается название, ее идентификатор и идентификатор родительской категории. Список сортируется по возрастанию идентификатора категории. Информация о категориях отключенных прайс-листов не предоставляется.

Метод возвращает результаты [постранично](Основные-понятия#Постраничный-возврат).

Подробнее см. в [документации API](https://tech.yandex.ru/market/partner/doc/dg/reference/get-campaigns-id-feeds-categories-docpage/).

## Отчеты по индексации прайс-листа

Метод `getIndexLogs` возвращает отчеты по индексации прайс-листа магазина:

```php
// Получаем объект с отчетами по индексации
$indexLogsObject = $assortmentClient->getIndexLogs(10001, 12345)->getResult();
// Получаем итератор по отчетам
$indexLogs = $indexLogsObject->getIndexLogRecords();
```

В отчете содержится статистика загрузки прайс-листа и результаты его автоматических проверок. Данные в отчете возвращаются в порядке убывания идентификаторов индексации.

Метод возвращает результаты [постранично](Основные-понятия#Постраничный-возврат).

Подробнее см. в [документации API](https://tech.yandex.ru/market/partner/doc/dg/reference/get-campaigns-id-feeds-id-index-logs-docpage/).

## Изменение параметров прайс-листа

Метод `setFeedParams` изменяет параметры прайс-листа:

```php
// Указываем период скачивания прайс-листа 720 минут
$setFeedParamsResponse = $assortmentClient->setFeedParams(10001, 12345, [
    'parameters' => [
        [   
            // Название параметра, обязательный параметр        
            'name' => 'reparseIntervalMinutes',
            // Список значений параметра, обязательный параметр 
            // (если нет параметра deleted)           
            'values' => [720,],
        ],            
]]);
```

Параметры можно сбрасывать к значениям по умолчанию:

```php
// Устанавливаем период скачивания прайс-листа по умолчанию (1440 минут)
$setFeedParamsResponse = $assortmentClient->setFeedParams(10001, 12345, [
    'parameters' => [
        [        
            'name' => 'reparseIntervalMinutes',
            // Удалить ли значение параметра, обязательный параметр
            // (если нет параметра values)                
            'deleted' => true,
        ],            
]]);
```

Подробнее см. в [документации API](https://tech.yandex.ru/market/partner/doc/dg/reference/post-campaigns-id-feeds-id-params-docpage/).

## Сообщить, что прайс-лист обновился

Метод `refreshFeed` сообщает, что магазин обновил прайс-лист. После этого Маркет начнет обновление данных на сервисе.

```php
// Сообщаем, что прайс-лист обновился
$refreshFeedResponse = $assortmentClient->refreshFeed(10001, 12345);
```

Подробнее см. в [документации API](https://tech.yandex.ru/market/partner/doc/dg/reference/post-campaigns-id-feeds-id-refresh-docpage/).

# Управление показом предложений

Методы клиента `HiddenOffersClient` позволяют управлять показом предложений: скрывать и возобновлять показ на Маркете.

```php
$hiddenOffersClient = new \Yandex\Market\Partner\Clients\HiddenOffersClient($clientId, $token);
```

## Информация о скрытых предложениях

Метод `getInfo` возвращает список скрытых предложений магазина: 

```php
// Получаем объект со скрытыми предложениями
$hiddenOffersObject = $hiddenOffersClient->getInfo(10001);
// Получаем итератор по скрытым предложениям
$hiddenOffers = $hiddenOffersObject->getHiddenOffers();
```

Предложения отсортированы в лексикографическом порядке: сначала по возрастанию идентификаторов прайс-листов, затем по возрастанию идентификаторов предложений.

Метод возвращает результаты [постранично](Основные-понятия#Постраничный-возврат).

Подробнее см. в [документации API](https://tech.yandex.ru/market/partner/doc/dg/reference/get-campaigns-id-hidden-offers-docpage/).

## Скрытие предложений и настройки скрытия

Метод `hideOffers` позволяет:

* Скрыть предложения магазина на Маркете на указанное время.

  ```php
  // Скрываем предложение
  $hideOffersResponse = $hiddenOffersClient->hideOffers(10001, [
      'hiddenOffers' => [
          [
              // Идентификатор прайс-листа, обязательный параметр
              'feedId' => 67891,
              // Идентификатор предложения, обязательный параметр              
              'offerId' => '101Ab12313C',
          ],
      ],
  ]);
  ```

* Изменить время скрытия предложений и комментарии. Чтобы внести изменения, передайте в теле запроса идентификатор уже скрытого предложения, идентификатор его прайс-листа и новые значения параметров `comment` и `ttlInHours`. При этом предыдущие значения этих параметров будут удалены.  

  ```php
  // Изменяем время скрытия предложения
  $hideOffersResponse = $hiddenOffersClient->hideOffers(10001, [
      'hiddenOffers' => [
          [
              // Идентификатор прайс-листа, обязательный параметр          
              'feedId' => 67891,
              // Идентификатор предложения, обязательный параметр               
              'offerId' => '101Ab12313C',
              // Количество часов до возобновления показа предложения,
              // необязательный параметр              
              'ttlInHours' => 72,
          ],
      ],
  ]);
  ```

Подробнее см. в [документации API](https://tech.yandex.ru/market/partner/doc/dg/reference/post-campaigns-id-hidden-offers-docpage/).

## Возобновление показа предложений

Метод `showOffers` возобновляет показ скрытых предложений магазина на Маркете.

```php
// Возобновляем показ предложения
$showOffersResponse = $hiddenOffersClient->showOffers(10001, [
    'hiddenOffers' => [
        [
            // Идентификатор прайс-листа, обязательный параметр
            'feedId' => 67891,
            // Идентификатор предложения, обязательный параметр              
            'offerId' => '101Ab12313C',
        ],
    ],
]);
```

Подробнее см. в [документации API](https://tech.yandex.ru/market/partner/doc/dg/reference/delete-campaigns-id-hidden-offers-docpage/).

# Управление ценами

Методы клиента `PriceClient` позволяют магазину работать с ценами предложений, размещенных на Маркете, без использования прайс-листов.

```php
$priceClient = new \Yandex\Market\Partner\Clients\PriceClient($clientId, $token);
```

## Установка цен на предложения

Метод `updatePrices` устанавливает цены на предложения без использования прайс-листов: 

* Чтобы установить новую цену вместо указанной в прайс-листе, укажите параметр `price`. Цена устанавливается на 30 дней с последнего обновления, после этого снова начнет действовать цена из прайс-листа.

  ```php
  // Устанавливаем цены предложений
  $updatePricesResponse = $priceClient->updatePrices(10001, [
      'offers' => [
          [
              // Идентификатор прайс-листа, обязательный параметр        
              'feed' => ['id' => 12345,],
              // Идентификатор предложения, обязательный параметр            
              'id' => '1636288',
              // Информация о новой цене, обязательный параметр
              // (если нет параметра delete)            
              'price' => [
                  // Новая цена, обязательный параметр            
                  'value' => 1500.00, 
                  // Валюта цены, обязательный параметр                
                  'currencyId' => 'RUR',
              ],
          ],
          [
              'feed' => ['id' => 12345,],
              'id' => '1671008',
              'price' => [
                  'value' => 800.00,
                  // Цена предложения без скидки, необязательный параметр.
                  // Если параметр указан, параметр value означает цену со скидкой
                  'discountBase' => 950.00,
                  'currencyId' => 'RUR',
              ],
          ],            
  ]]);
  ```

* Чтобы удалить цену предложения, установленную через API, укажите параметр `'delete' => true`. После удаления начнет действовать цена из прайс-листа.

  ```php
  // Удаляем цену предложения, установленную через API
  $updatePricesResponse = $priceClient->updatePrices(10001, [
      'offers' => [
          [  
              'feed' => ['id' => 12345,],          
              'id' => '1631602',
              // Удалять ли цену, установленную через API.
              // Обязательный параметр (если нет параметра price)            
              'delete' => true,
          ],
  ]]);
  ```  
  
Подробнее см. в [документации API](https://tech.yandex.ru/market/partner/doc/dg/reference/post-campaigns-id-offer-prices-updates-docpage/).

## Удаление всех цен, установленных через API

Метод `deletePrices` удаляет все цены на предложения, установленные через API. После удаления начнут действовать цены из прайс-листов.

```php
// Удаляем все цены
$deletePricesResponse = $priceClient->deletePrices(10001);
```

Подробнее см. в [документации API](https://tech.yandex.ru/market/partner/doc/dg/reference/post-campaigns-id-offer-prices-removals-docpage/).

**_Внимание!_** Передавать в аргументах метода входной параметр `removeAll` не нужно.

## Список цен, установленных через API

Метод `getOfferPrices` возвращает список цен на предложения, установленных через партнерский API.

```php
// Получаем список цен
$offerPrices = $priceClient->getOfferPrices(10001);
```

Метод возвращает результаты [постранично](Основные-понятия#Постраничный-возврат), но метод `getPager` не реализован, так как ресурс не возвращает информацию о страницах.

Подробнее см. в [документации API](https://tech.yandex.ru/market/partner/doc/dg/reference/get-campaigns-id-offer-prices-docpage/).

# Модели товаров

Методы клиента `ModelClient` возвращают информацию о моделях товаров Маркета, а также о предложениях на модели.

```php
$modelClient = new \Yandex\Market\Partner\Clients\ModelClient($clientId, $token);
```

## Информация о модели

Метод `getModelInfo` возвращает информацию о модели товара.

```php
// Получаем информацию об МФУ Epson L3050 в Москве
$modelInfo = $modelClient->getModelInfo(1845642111,
    // Идентификатор региона, обязательный параметр
    ['regionId' => 213,]
);
```

Подробнее см. в [документации API](https://tech.yandex.ru/market/partner/doc/dg/reference/get-models-id-docpage/).

## Поиск модели товара

Метод `getModelMatch` возвращает информацию о моделях, удовлетворяющих заданным условиям поиска.

```php
// Получаем объект с моделями, найденными по запросу «мойка karcher» 
$modelMatchObject = $modelClient->getModelMatch([
    // Поисковый запрос, обязательный параметр
    'query' => 'мойка karcher',
    // Идентификатор региона, обязательный параметр
    'regionId' => 213,  
]);
// Получаем итератор по моделям
$modelMatch = $modelMatchObject->getModels();
```

Метод возвращает результаты [постранично](Основные-понятия#Постраничный-возврат).

Подробнее см. в [документации API](https://tech.yandex.ru/market/partner/doc/dg/reference/post-models-docpage/).

## Информация о нескольких моделях

Метод `getModelsInfo` возвращает информацию о моделях товаров.

```php
// Получаем объект с информацией о плитах GEFEST 900 и BEKO FSM 67320 GAS в Москве
$modelsInfoObject = $modelClient->getModelsInfo([
    // Идентификатор региона, обязательный параметр
    'regionId' => 213,
    // Список идентификаторов моделей, обязательный параметр    
    'models' => [7077530, 14018995,],    
]);
// Получаем итератор по моделям
$modelsInfo = $modelsInfoObject->getModels();
```

Метод содержит в выходных данных [итератор](Основные-понятия#Итераторы).

Подробнее см. в [документации API](https://tech.yandex.ru/market/partner/doc/dg/reference/post-models-docpage/).

## Список предложений для модели

Метод `getModelOffers` возвращает информацию о первых десяти предложениях, расположенных на карточке модели.

```php
// Получаем объект с первыми 10 предложениями на смартфон Honor 10 4/128GB
$modelOffersObject = $modelClient->getModelOffers(43052348, [
    // Идентификатор региона, обязательный параметр
    'regionId' => 213,
]);
// Получаем итератор по предложениям
$modelOffers = $modelOffersObject->getOffers();
// Получаем итератор по ценам предложений
$modelOffersPrices = $modelOffersObject->getPrices();
```

Метод содержит в выходных данных [итераторы](Основные-понятия#Итераторы) по предложениям и их ценам.

Подробнее см. в [документации API](https://tech.yandex.ru/market/partner/doc/dg/reference/get-models-id-offers-docpage/).

## Список предложений для нескольких моделей

Метод `getModelsOffers` возвращает информацию о первых десяти предложениях, расположенных на карточках моделей, идентификаторы которых указаны в аргументах.

```php
// Получаем объект с первыми 10 предложениями 
// на процессоры Intel Core i5 Coffee Lake и Intel Core i7 Coffee Lake
$modelsOffersObject = $modelClient->getModelsOffers([
    // Идентификатор региона, обязательный параметр
    'regionId' => 213,
    // Список идентификаторов моделей    
    'models' => [1769282505, 1769282498,],   
]);
// Получаем итератор по предложениям
$modelsOffers = $modelsOffersObject->getOffers();
// Получаем итератор по ценам предложений
$modelsOffersPrices = $modelsOffersObject->getPrices();
```

Метод содержит в выходных данных [итераторы](Основные-понятия#Итераторы) по предложениям и их ценам.

Подробнее см. в [документации API](https://tech.yandex.ru/market/partner/doc/dg/reference/post-models-offers-docpage/).

# Управление ставками

Методы клиента `BidClient` позволяют устанавливать и удалять ставки на предложения на Маркете. 

```php
$bidClient = new \Yandex\Market\Partner\Clients\BidClient($clientId, $token);
```

Подробнее см. раздел [Ставки — повышение стоимости клика](https://yandex.ru/support/partnermarket/auction/placement.html) в Помощи Маркета для магазинов.

Предложения должны указываться в аргументах методов в зависимости от выбранного типа идентификации: по идентификатору (аргументы `feedId` и `offerId`) или по названию (аргумент `offerName`). Тип идентификации предложений выбирается в личном кабинете. Подробнее см. в [документации API](https://tech.yandex.ru/market/partner/doc/dg/reference/rate-methods-docpage/#rate-methods__settings).

## Информация о ставках

Метод `getBids` возвращает информацию об установленных ставках на предложения для магазина. Предложения, для которых нужно получить информацию, указываются в аргументах метода.

```php
// Получаем итератор по установленным ставкам
$bids = $bidClient->getBids(10001, [
    // Список предложений
    'offers' => [
        [
            // Идентификатор прайс-листа, содержащего предложение        
            'feedId' => 12345,
            // Идентификатор предложения в прайс-листе
            'id' => '120',
        ],
        ['feedId' => 12345, 'id' => '121',],
        ['feedId' => 12345, 'id' => '122',],        
]]);
```

Метод возвращает [итератор](Основные-понятия#Итераторы).

Подробнее см. в [документации API](https://tech.yandex.ru/market/partner/doc/dg/reference/post-campaigns-id-bids-docpage/).

## Установка ставок на предложения

Метод `setBids` устанавливает или удаляет ставки на предложения.

**_Внимание!_** Для использования этого метода необходимо, чтобы в личном кабинете в качестве источника информации о ставках был выбран личный кабинет и API. Подробнее см. в [документации API](https://yandex.ru/support/partnermarket/auction/select-and-set.html).

```php
// Устанавливаем ставки на два предложения, 
// для третьего запрещаем поднимать ставку до минимального значения,
// для четвертого устанавливаем ставку по умолчанию
$setBidsResponse = $bidClient->setBids(10001, [
    // Список ставок
    'bids' => [
        [
            // Идентификатор прайс-листа, содержащего предложение        
            'feedId' => 12345,
            // Идентификатор предложения в прайс-листе
            'id' => '239982',
            // Общая ставка в условных единицах
            'bid' => 0.22,            
        ],
        [
            'feedId' => 12345, 
            'id' => '239983',
            'bid' => 0.45,
            // Отключить автоматическое повышение ставки bid 
            // до минимального значения
            'dontPullUpBids' => true,            
        ],
        ['feedId' => 12345, 'id' => '239984', 'dontPullUpBids' => true,],
        ['feedId' => 12345, 'id' => '239986', 'bid' => 0,],        
]]);
```

Метод возвращает [итератор](Основные-понятия#Итераторы) по установленным ставкам.

Подробнее см. в [документации API](https://tech.yandex.ru/market/partner/doc/dg/reference/put-campaigns-id-bids-docpage/).

## Рекомендованные ставки

Метод `getRecommendedBids` возвращает рекомендованные значения ставок на предложения для размещения этих предложений на соответствующих местах.

**_Внимание!_** Возвращаемые ставки являются прогнозируемыми и не гарантируют попадание предложения на указанное место размещения.

* Чтобы получить рекомендованные ставки для размещения на карточках товаров Маркета, укажите во входных данных аргумент `'target' => 'MODEL-CARD'`:

  ```php
  // Получаем итератор по рекомендованным ставкам для карточек товаров
  $recommendedBidsModelCard = $bidClient->getRecommendedBids(10001, [
      // Тип ставки — ставка для размещения на конкретной позиции на карточке товара  
      'target' => 'MODEL-CARD',
      // Список предложений
      'offers' => [
          [
              // Идентификатор прайс-листа, содержащего предложение        
              'feedId' => 12345,
              // Идентификатор предложения в прайс-листе
              'id' => '239982',       
          ],
          ['feedId' => 12345, 'id' => '239983',],     
  ]]);
  ```

  Подробнее см. в [документации API](https://tech.yandex.ru/market/partner/doc/dg/reference/post-campaigns-id-bids-recommended-docpage/).
  
* Чтобы получить рекомендованные ставки для размещения среди первых 12 предложений магазинов в поиске Маркета, укажите во входных данных аргумент `'target' => 'MARKET-SEARCH'`: 

  ```php
  // Получаем итератор по рекомендованным ставкам для поиска Маркета
  $recommendedBidsMarketSearch = $bidClient->getRecommendedBids(10001, [
      // Тип ставки — ставка  для размещения среди первых 12 предложений магазинов в поиске Маркета  
      'target' => 'MARKET-SEARCH',
      // Список предложений
      'offers' => [
          [
              // Идентификатор прайс-листа, содержащего предложение        
              'feedId' => 12345,
              // Идентификатор предложения в прайс-листе
              'id' => '239982',       
          ],
          ['feedId' => 12345, 'id' => '239983',],     
  ]]);
  ```

  Подробнее см. в [документации API](https://tech.yandex.ru/market/partner/doc/dg/reference/post-campaigns-id-bids-recommended-market-search-docpage/).
  
* Чтобы получить рекомендованные ставки для размещения предложений в поиске Яндекса, укажите во входных данных аргумент `'target' => 'SEARCH'`:  

  ```php
  // Получаем итератор по рекомендованным ставкам для поиска Яндекса
  $recommendedBidsSearch = $bidClient->getRecommendedBids(10001, [
      // Тип ставки — ставка для размещения в блоке предложений Маркета в поиске Яндекса.  
      'target' => 'SEARCH',
      // Список предложений
      'offers' => [
          [
              // Идентификатор прайс-листа, содержащего предложение        
              'feedId' => 12345,
              // Идентификатор предложения в прайс-листе
              'id' => '239982',       
          ],
          ['feedId' => 12345, 'id' => '239983',],     
  ]]);
  ```

  Подробнее см. в [документации API](https://tech.yandex.ru/market/partner/doc/dg/reference/post-campaigns-id-bids-recommended-search-docpage/).

Метод возвращает [итератор](Основные-понятия#Итераторы).

## Рекомендации по популярным запросам в поиске Маркета

Метод `getPopularRecommendedBidsMarketSearch` возвращает список популярных запросов в поиске Маркета, рекомендованных для предложения, и рекомендованные значения ставок.

**_Внимание!_** Возвращаемые ставки являются прогнозируемыми и не гарантируют попадание предложения на указанное место размещения.

```php
// Получаем итератор по рекомендациям
$popularRecommendedBidsMarketSearch = $bidClient->getPopularRecommendedBidsMarketSearch(10001, [
    // Список предложений
    'offers' => [
        [
            // Идентификатор прайс-листа, содержащего предложение        
            'feedId' => 12345,
            // Идентификатор предложения в прайс-листе
            'id' => '239982',       
        ],
        ['feedId' => 12345, 'id' => '239983',],     
]]);
```

Метод возвращает [итератор](Основные-понятия#Итераторы).

Подробнее см. в [документации API](https://tech.yandex.ru/market/partner/doc/dg/reference/post-campaigns-id-bids-recommended-top-market-search-docpage/).

## Настройки ставок

Метод `getBidsSettings` возвращает информацию о настройках установленных ставок для магазина.

```php
// Получаем настройки ставок
$bidsSettings = $bidClient->getBidsSettings(10001);
```

Подробнее см. в [документации API](https://tech.yandex.ru/market/partner/doc/dg/reference/get-campaigns-id-bids-settings-docpage/).

# Финансы

Методы клиента `FinanceClient` возвращают финансовую информацию о размещении магазинов на Маркете.

```php
$financeClient = new \Yandex\Market\Partner\Clients\FinanceClient($clientId, $token);
```

## Баланс магазина и прогноз расходования средств

Метод `getBalance` возвращает актуальный баланс средств магазина, а также прогноз расходования средств и рекомендации по размеру платежа.

```php
// Получаем объект с финансовой информацией о магазине
$balanceObject = $financeClient->getBalance(10001);
// Получаем баланс
$balance = $balanceObject->getBalance();
// Получаем прогнозируемое количество дней, оставшихся до полного израсходования средств
$balanceDaysLeft = $balanceObject->getDaysLeft();
// Получаем рекомендованную сумму платежа
$recommendedPayment = $balanceObject->getRecommendedPayment();
```

Подробнее см. в [документации API](https://tech.yandex.ru/market/partner/doc/dg/reference/get-campaigns-id-balance-docpage/).

# Статистика

Методы клиента `StatisticClient` возвращают статистическую информацию о размещении магазинов на Маркете.

```php
$statisticClient = new \Yandex\Market\Partner\Clients\StatisticClient($clientId, $token);
```

## Базовая статистика

Методы базовой статистики возвращают информацию о кликах, показах и расходе по магазину за запрашиваемый период времени. Максимальный период времени для получения статистики в одном запросе — 180 дней.

* Методы `getMain` и `getDaily` возвращают статистику за каждый день указанного периода.

  ```php
  // Получаем статистику за каждый день с 19 ноября по 22 декабря 2018 года
  $statsDaily = $statisticClient->getMain(10001, [
      // Начальная дата отчетного периода, обязательный параметр
      'fromDate' => '19-11-2018',
      // Конечная дата отчетного периода, необязательный параметр
      'toDate' => '22-12-2018',      
  ]);
  ```

* Метод `getWeekly` возвращает сводную статистику за каждую неделю указанного периода.

  ```php
  // Получаем статистику за каждую неделю с 19 ноября по 22 декабря 2018 года.
  // Возвращаются данные за 5 недель (последняя — неполная, без воскресенья 23 декабря)  
  $statsDaily = $statisticClient->getWeekly(10001, [
      // Начальная дата отчетного периода, обязательный параметр
      'fromDate' => '19-11-2018',
      // Конечная дата отчетного периода, необязательный параметр
      'toDate' => '22-12-2018',      
  ]);
  ```

* Метод `getMonthly` возвращает сводную статистику за каждый месяц указанного периода.

  ```php
  // Получаем сводную статистику:
  // * с 19 по 30 ноября 2018 года;
  // * с 1 по 22 декабря 2018 года 
  $statsDaily = $statisticClient->getMonthly(10001, [
      // Начальная дата отчетного периода, обязательный параметр
      'fromDate' => '19-11-2018',
      // Конечная дата отчетного периода, необязательный параметр
      'toDate' => '22-12-2018',      
  ]);
  ```

Подробнее см. в [документации API](https://tech.yandex.ru/market/partner/doc/dg/reference/get-campaigns-id-balance-docpage/).

## Статистика по предложениям

Метод `getOffersStats` возвращает базовую статистику (клики и расход) по предложениям магазина за запрашиваемый период времени:

```php
// Получаем объект со сводной статистикой по предложениям с 19 ноября по 22 декабря 2018 года
$offersStatsObject = $statisticClient->getOffersStats(10001, [
    // Начальная дата отчетного периода, обязательный параметр
    'fromDate' => '19-11-2018',
    // Конечная дата отчетного периода, необязательный параметр
    'toDate' => '22-12-2018',      
]);
// Получаем итератор по предложениям
$offersStats = $offerStatsObject->getOfferStats();
```

Метод содержит в выходных данных [итератор](Основные-понятия#Итераторы).

Подробнее см. в [документации API](https://tech.yandex.ru/market/partner/doc/dg/reference/get-campaigns-id-stats-offers-docpage/).

# Геобаза

Методы клиента `GeobaseClient` возвращают информацию о регионах.

```php
$geobaseClient = new \Yandex\Market\Partner\Clients\GeobaseClient($clientId, $token);
```

## Поиск региона

Метод `getRegionsMatch` возвращает информацию о регионе, удовлетворяющем заданным в запросе условиям поиска.

```php
// Получаем итератор по регионам, удовлетворяющим запросу «Астрахань»
$regions = $geobaseClient->getRegionsMatch([
    // Название региона, обязательный параметр.
    // Первая буква должна быть заглавной, остальные — строчными.    
    'name' => 'Астрахань',     
]);
```

Метод возвращает [итератор](Основные-понятия#Итераторы).

Подробнее см. в [документации API](https://tech.yandex.ru/market/partner/doc/dg/reference/get-regions-docpage/).

## Информация о регионе

Метод `getRegion` возвращает информацию о регионе.

```php
// Получаем информацию о Республике Бурятии
$region = $geobaseClient->getRegion(11330);
```

Подробнее см. в [документации API](https://tech.yandex.ru/market/partner/doc/dg/reference/get-regions-id-docpage/).

## Информация о дочерних регионах

Метод `getRegionChilds` возвращает информацию о регионах, являющихся дочерними по отношению к указанному региону.

```php
// Получаем объект с дочерними регионами Республики Бурятии
$regionChildrenObject = $geobaseClient->getRegionChilds(11330);
// Получаем итератор по регионам
$regionChildren = $regionChildrenObject->getRegions();
```

Метод возвращает результаты [постранично](Основные-понятия#Постраничный-возврат).

Подробнее см. в [документации API](https://tech.yandex.ru/market/partner/doc/dg/reference/get-regions-id-children-docpage/).

# Точки продаж

Методы клиента `OutletClient` позволяют управлять точками продаж магазина.

```php
$outletClient = new \Yandex\Market\Partner\Clients\OutletClient($clientId, $token);
```

## Информация о точках продаж

Метод `getOutletsInfo` возвращает список точек продаж магазина.

```php
// Получаем объект с точками продаж магазина
$outletsObject = $outletClient->getOutletsInfo(10001);
// Получаем итератор по точкам продаж
$outlets = $outletsObject->getOutlets();
```

Метод возвращает результаты [постранично](Основные-понятия#Постраничный-возврат).

Подробнее см. в [документации API](https://tech.yandex.ru/market/partner/doc/dg/reference/get-campaigns-id-outlets-docpage/).

## Информация о точке продаж

Метод `getOutletInfo` возвращает информацию о точке продаж магазина.

```php
// Получаем информацию о точке продаж
$outlet = $outletClient->getOutletInfo(10001, 171819);
```

Подробнее см. в [документации API](https://tech.yandex.ru/market/partner/doc/dg/reference/get-campaigns-id-outlets-id-docpage/).

## Создание точки продаж

Метод `createOutlet` создает точку продаж магазина на Маркете.

```php
// Создаем точку продаж в Калининграде
$createOutletResponse = $outletClient->createOutlet(10001, [
    // Название точки продаж, обязательный параметр
    'name' => 'На Озерной',
    // Тип точки продаж, обязательный параметр
    'type' => 'DEPOT', // смешанный тип точки продаж (торговый зал и пункт выдачи заказов)
    // Адрес точки продаж, обязательный параметр
    'address' => [
        // Идентификатор региона, обязательный параметр    
        'regionId' => 22,
        // Улица, необязательный параметр        
        'street' => 'ОЗЕРНАЯ',
        // Номер дома, необязательный параметр
        'number' => '20А',
    ],
    // Телефоны точки продаж, обязательный параметр
    'phones' => ['+7 (401) 212-22-32 #123',],
    // Адрес электронной почты точки продаж, обязательный параметр
    'emails' => ['example-shop@yandex.ru'],    
    // Список режимов работы точки продаж, обязательный параметр
    'workingSchedule' => [
        // Список расписаний работы точки продаж, обязательный параметр    
        'scheduleItems' => [
            [
                // День недели, с которого точка продаж работает в указанное время.
                // Обязательный параметр
                'startDay' => 'MONDAY',
                // День недели, по который точка продаж работает в указанное время.
                // Обязательный параметр
                'endDay' => 'FRIDAY',
                // Время, с которого точка продаж работает в указанные дни недели.
                // Обязательный параметр
                'startTime' => '09:00',
                // Время, по которое точка продаж работает в указанные дни недели.
                // Обязательный параметр
                'endTime' => '19:00',
            ],
            [
                'startDay' => 'SATURDAY',
                'endDay' => 'SATURDAY',
                'startTime' => '10:00',
                'endTime' => '16:00',
            ],            
        ],
    ],
    // Информация об условиях доставки в точку продаж.
    // Обязательный параметр, если 'type' == 'DEPOT' или 'type' == 'MIXED'    
    'deliveryRules' => [
        [
            // Минимально возможный срок (в рабочих днях) доставки товаров в точку продаж.
            // Обязательный параметр, если 'type' == 'DEPOT' или 'type' == 'MIXED' 
            'minDeliveryDays' => 0,
            // Максимально возможный срок (в рабочих днях) доставки товаров в точку продаж.
            // Необязательный параметр
            'maxDeliveryDays' => 2,
            // Стоимость самовывоза из точки продаж.  
            // Обязательный параметр, если 'type' == 'DEPOT' или 'type' == 'MIXED' 
            'cost' => 285.0,
        ]
    ],        
]);
// Проверяем, что точка продаж создана, и получаем ее идентификатор
if ($createOutletResponse->getStatus() == 'OK')
    $outletId = $createOutletResponse->getResult()['id'];
```

Подробнее см. в [документации API](https://tech.yandex.ru/market/partner/doc/dg/reference/post-campaigns-id-outlets-docpage/).

## Изменение информации о точке продаж

Метод `updateOutlet` изменяет информацию о точке продаж магазина на Маркете.

```php
// Изменяем информацию о точке продаж
$updateOutletResponse = $outletClient->updateOutlet(10001, 171819, [
    // Название точки продаж, обязательный параметр
    'name' => 'На Озерной в начале улицы',
    // Тип точки продаж, обязательный параметр
    'type' => 'DEPOT', // смешанный тип точки продаж (торговый зал и пункт выдачи заказов)
    // Адрес точки продаж, обязательный параметр
    'address' => [
        // Идентификатор региона, обязательный параметр    
        'regionId' => 22,
        // Улица, необязательный параметр        
        'street' => 'ОЗЕРНАЯ',
        // Номер дома, необязательный параметр
        'number' => '20А',
    ],
    // Телефоны точки продаж, обязательный параметр
    'phones' => ['+7 (401) 212-22-32 #123',],
    // Адрес электронной почты точки продаж, обязательный параметр
    'emails' => ['example-shop@yandex.ru'],    
    // Список режимов работы точки продаж, обязательный параметр
    'workingSchedule' => [
        // Список расписаний работы точки продаж, обязательный параметр    
        'scheduleItems' => [
            [
                // День недели, с которого точка продаж работает в указанное время.
                // Обязательный параметр
                'startDay' => 'MONDAY',
                // День недели, по который точка продаж работает в указанное время.
                // Обязательный параметр
                'endDay' => 'FRIDAY',
                // Время, с которого точка продаж работает в указанные дни недели.
                // Обязательный параметр
                'startTime' => '09:00',
                // Время, по которое точка продаж работает в указанные дни недели.
                // Обязательный параметр
                'endTime' => '19:00',
            ],
            [
                'startDay' => 'SATURDAY',
                'endDay' => 'SATURDAY',
                'startTime' => '10:00',
                'endTime' => '18:00',
            ],            
        ],
    // Информация об условиях доставки в точку продаж.
    // Обязательный параметр, если 'type' == 'DEPOT' или 'type' == 'MIXED'    
    'deliveryRules' => [
        [
            // Минимально возможный срок (в рабочих днях) доставки товаров в точку продаж.
            // Обязательный параметр, если 'type' == 'DEPOT' или 'type' == 'MIXED' 
            'minDeliveryDays' => 0,
            // Максимально возможный срок (в рабочих днях) доставки товаров в точку продаж.
            // Необязательный параметр
            'maxDeliveryDays' => 1,
            // Стоимость самовывоза из точки продаж.  
            // Обязательный параметр, если 'type' == 'DEPOT' или 'type' == 'MIXED' 
            'cost' = 300.0,
        ]
    ],        
]);
```

Подробнее см. в [документации API](https://tech.yandex.ru/market/partner/doc/dg/reference/put-campaigns-id-outlets-id-docpage/).

## Удаление точки продаж

Метод `deleteOutlet` удаляет точку продаж магазина на Маркете.

```php
// Удаляем точку продаж
$deleteOutletResponse = $outletClient->deleteOutlet(10001, 171819);
```

Подробнее см. в [документации API](https://tech.yandex.ru/market/partner/doc/dg/reference/delete-campaigns-id-outlets-id-docpage/).

# Контроль качества

Методы клиента `QualityClient` возвращают информацию об ошибках и проверках магазина службой контроля качества Маркета, а также позволяют сообщить об исправленных ошибках.

```php
$qualityClient = new \Yandex\Market\Partner\Clients\QualityClient($clientId, $token);
```

## Информация об ошибках магазина

Метод `getTickets` возвращает данные о текущих ошибках магазина, выявленных службой контроля качества Маркета.

```php
// Получаем итератор по ошибкам магазина
$tickets = $qualityClient->getTickets(10001);
```

Метод возвращает [итератор](Основные-понятия#Итераторы).

Подробнее см. в [документации API](https://tech.yandex.ru/market/partner/doc/dg/reference/get-campaigns-id-quality-tickets-docpage/).

## Информация об ошибке магазина

Метод `getTicket` возвращает данные об ошибке магазина, выявленной службой контроля качества Маркета.

```php
// Получаем информацию об ошибке магазина
$ticket = $qualityClient->getTicket(10001, 2799068)->current();
```

Подробнее см. в [документации API](https://tech.yandex.ru/market/partner/doc/dg/reference/get-campaigns-id-quality-tickets-id-docpage/).

## Отчет по качеству

Метод `getReport` возвращает [отчет по качеству](https://yandex.ru/support/partnermarket/quality/quality-report.html) работы магазина, составленный службой контроля качества Маркета. Отчет содержит всю информацию о качестве работы вашего магазина, результатах регулярных проверок, выявленных ошибках и проблемах.

```php
// Получаем отчет по качеству
$qualityReport = $qualityClient->getReport(10001);
```

Подробнее см. в [документации API](https://tech.yandex.ru/market/partner/doc/dg/reference/get-campaigns-id-quality-report-docpage/).

## Сообщить, что ошибка исправлена

Метод `fixError` сообщает службе контроля качества Маркета, что ошибка исправлена.

```php
// Сообщаем, что ошибка исправлена
$fixErrorResponse = $qualityClient->fixError(10001, 2799068);
```

Подробнее см. в [документации API](https://tech.yandex.ru/market/partner/doc/dg/reference/post-campaigns-id-quality-tickets-id-fix-docpage/).

## Отправить магазин на проверку

Метод `checkCampaign` отправляет отключенный магазин на проверку в службу контроля качества Маркета. Проверка необходима, чтобы перед [повторным подключением магазина](https://yandex.ru/support/partnermarket/quality/reconnection.html) убедиться, что ошибки действительно устранены.

```php
// Отправляем магазин на проверку
$checkCampaignResponse = $qualityClient->checkCampaign(10001);
// Получаем примерное время окончания проверки магазина службой контроля качества
$checkCampaignEstimatedEndTime = $checkCampaignResponse->getEstimatedEndTime();
```

Подробнее см. в [документации API](https://tech.yandex.ru/market/partner/doc/dg/reference/post-campaigns-id-quality-check-docpage/).