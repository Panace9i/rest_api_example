# RESTful API for example

API на базе архитектуры RESTful для организации работы с заказами.

## Стек технологий
В данном блоке описан стек технологий на базе которых реализовано тестовое задание:
  - PHP
  - MySQL
  - FW Phalcon
  - Codeception
  
Выбор FW Phalcon обоснован тем что ядро фреймворка написано на языке С++, что даёт приемущество по производительности в сравнении с другими FW.
## Установка VM
Разверните виртуальную машину. Репозиторий для vagrant box можно взять
[здесь](https://github.com/phalcon/box) 

[Инструкция по установке](https://docs.phalconphp.com/en/latest/environments-vagrant)

## Разворачивание проекта
Распакуйте архив в папке workspace.
Установите все необходимые пакеты выполнив команду:
```
composer install
```
Подключитесь к vm используя команду
```
vagrant ssh
```
Для работы с миграциями установите phalcon devtools в соответствии [инструкцией](https://docs.phalconphp.com/ru/3.2/devtools-usage)

Создайте mysql пользователя
```
 CREATE USER 'web'@'localhost' IDENTIFIED BY '123456';
 GRANT ALL PRIVILEGES ON * . * TO 'web'@'localhost';
 FLUSH PRIVILEGES;
```
Подгрузите структуру данных БД из миграций или dump-файла.
## Методы API
 
>Протокол использует basic authorization <br>
>Логин/пароль: sergey/123
```
GET: /products
```
Получения списка доступых товаров
```
GET: /order
```
Получения списка пользовательских заказов
```
POST: /order/<product_id>
```
Создание заказа
```
DELETE: /order/<product_id>
```
Удаление заказа

### Пример запроса
```
curl -vv --user sergey:123 127.0.0.1/order
```

## Тестирование
Находясь в корневой директории проекта выполните команду
```
php /path/to/codeception/codecept run
```


## Коды ошибок
- 400: заказ уже произведён
- 401: ошибка авторизации
- 404: нет записи в БД 
- 405: метод не разрешён

