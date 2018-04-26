# RESTful API for example

API �� ���� ����������� RESTful ��� ����������� ������ � ��������.

## ���� ����������
� ������ ����� ������ ���� ���������� �� ���� ������� ����������� �������� �������:
  - PHP
  - MySQL
  - FW Phalcon
  - Codeception
  
����� FW Phalcon ��������� ��� ��� ���� ���������� �������� �� ����� �++, ��� ��� ������������ �� ������������������ � ��������� � ������� FW.
## ��������� VM
���������� ����������� ������. ����������� ��� vagrant box ����� �����
[�����](https://github.com/phalcon/box) 

[���������� �� ���������](https://docs.phalconphp.com/en/latest/environments-vagrant)

## �������������� �������
���������� ����� � ����� workspace.
���������� ��� ����������� ������ �������� �������:
```
composer install
```
������������ � vm ��������� �������
```
vagrant ssh
```
��� ������ � ���������� ���������� phalcon devtools � ������������ [�����������](https://docs.phalconphp.com/ru/3.2/devtools-usage)

�������� mysql ������������
```
 CREATE USER 'web'@'localhost' IDENTIFIED BY '123456';
 GRANT ALL PRIVILEGES ON * . * TO 'web'@'localhost';
 FLUSH PRIVILEGES;
```
���������� ��������� ������ �� �� �������� ��� dump-�����.
## ������ API
 
>�������� ���������� basic authorization <br>
>�����/������: sergey/123
```
GET: /products
```
��������� ������ �������� �������
```
GET: /order
```
��������� ������ ���������������� �������
```
POST: /order/<product_id>
```
�������� ������
```
DELETE: /order/<product_id>
```
�������� ������

### ������ �������
```
curl -vv --user sergey:123 127.0.0.1/order
```

## ������������
�������� � �������� ���������� ������� ��������� �������
```
php /path/to/codeception/codecept run
```


## ���� ������
- 400: ����� ��� ���������
- 401: ������ �����������
- 404: ��� ������ � �� 
- 405: ����� �� ��������

