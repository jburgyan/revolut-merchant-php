# Revolut Merchant api Library

## Оглавление

- [Установка](#установка)

## Установка

Установить библиотеку можно с помощью composer:

```
composer require flowwow/revolut-merchant-php
```

## RevolutMerchant\Client
If you want to get a `production` client:

```php
use Flowwow\RevolutMerchant\Client;

$client = new Client($accessToken);
```

If you want to get a `sandbox` client:

```php
use Flowwow\RevolutMerchant\Client;

$client = new Client($accessToken, true);
```


## License

MIT
