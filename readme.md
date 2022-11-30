
# Kafka wrapper for Laravel 6+

Install kissht kafka wrapper

```bash
  composer require kisshteventproducer/kafka
```

## Add provide in app.php

LaravelKafka\Producer\KafkaEventProvider::class,

## Test Kafka
http://localhost:8000/kafka-test





## Use Kafka in code.

Add following in web.php

```bash
use LaravelKafka\Producer\Events\KafkaTestEvent;

Route::get('/', function () {
    KafkaTestEvent::publish(
        'IDEP168647251797S81J'
    );
});

```
## Environment Variables

To run this, you will need to add the following environment variables to your .env file

`IS_KAFKA_ENABLED=1`

`KAFKA_BROKERS=server-1, server-2`

`KAFKA_DEBUG=false`


# For this wrapper is required to pre installed rdkafka, please follow steps to install rdkafka.
## Installation rdkafka (Ubuntu)

Install PHP pecl and pear commands

```bash
  sudo apt install php-pear php-dev
```

Install librdkafka

```bash
sudo apt-get install -y librdkafka-dev
```

Install PECL-package

```bash
sudo pecl install rdkafka
```

Enable PHP-extension in PHP config. Add to php.ini

```bash
sudo nano /etc/php/<PHP_VERSION>/cli/php.ini
sudo nano /etc/php/<PHP_VERSION>/apache/php.ini
sudo nano /etc/php/<PHP_VERSION>/nginx/php.ini

Add the below line at the end of php.inifiles
extension=rdkafka.so

```

Reload apache/nginx (Optional for local environment)
```bash
sudo service apache2 reload
sudo service nginx reload
```

Verify if the installation is working (CLI)
```bash
php -m | grep 

output :
rdkafka
```



## Installation rdkafka (MAC)

Install librdkafka

```bash
brew install librdkafka
```

Install PECL-package

```bash
sudo pecl install rdkafka
```

If the above command throws error, then we must install it manually

```bash
cd ~
pecl download rdkafka-6.0.3
tar xf rdkafka-6.0.3.tgz
cd rdkafka-6.0.3
phpize
./configure --with-rdkafka="$(brew --prefix librdkafka)" --with-php-config="$(which php-config)"
make
make install
```

Enable PHP-extension in PHP config. Add to php.ini

```bash
sudo nano /etc/php/<PHP_VERSION>/cli/php.ini
sudo nano /etc/php/<PHP_VERSION>/apache/php.ini
sudo nano /etc/php/<PHP_VERSION>/nginx/php.ini

Add the below line at the end of php.inifiles
extension=rdkafka.so

```

Reload apache/nginx (Optional for local environment)
```bash
sudo service apache2 reload
sudo service nginx reload
```

Verify if the installation is working (CLI)
```bash
php -m | grep 

output :
rdkafka
```


## Authors

- [@kissht](https://www.github.com/kissht)


## License

[MIT](https://choosealicense.com/licenses/mit/)


## Screenshots

![App Screenshot](https://www.linkpicture.com/q/Screenshot-from-2022-11-21-13-28-17.png)


## Features

- Light weight kakfa wrapper
- Easy to use event produce in code.


## Documentation

[Documentation](https://linktodocumentation)

