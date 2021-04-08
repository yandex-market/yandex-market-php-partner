# PHP-библиотека партнерского API Яндекс.Маркета для моделей ADV и DBS

С помощью партнерского API Яндекс.Маркета для моделей DBS (*Delivery by Seller*, продажи с доставкой продавца) и ADV (*Advertising*, рекламная модель) внешние приложения могут получать сведения о своих магазинах и предложениях и управлять ими. Библиотека написана на языке PHP и содержит методы для работы с партнерским API. 

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

Подробнее см. [Wiki](https://github.com/yandex-market/yandex-market-php-partner/wiki) и документацию партнерского API Маркета для моделей:
- [DBS](https://yandex.ru/dev/market/partner-dsbs/doc/dg/concepts/about.html);
- [ADV](https://yandex.ru/dev/market/partner/doc/dg/concepts/about.html).   