
## Тестовое задание

Моменты, которые не успел сделать, но в случае необходимости могу сделать их по запросу для подтверждения опыта

- Тесты
- Swagger

## Комментарий

 - Намеренно переименовал guid в id, т.к. в рамках текущей задачи нет необходимости в переименовании primarKey и создания traits для методов чанков, который работают исключительно по ID
 - Если данное требование необходимо, возможна доработка

## Деплой

 - composer install
 - npm install
 - docker-compose up
 - php artisan migrate

## Окружение
 - php 8.1 с расширением swoole 
 - mysql
 - nginx
 - redis

## Api

 - http://localhost:8989/api/prices (с пагинацией)
 - http://localhost:8989/api/prices/{product_id}

```json
{
  "prices": [
     {
         "id": "01351fc3-a7a2-35d0-bbc9-b3675a81d961",
         "price": 111.03
     },
     {
         "id": "0513cd3c-93c4-3f0e-97a0-cf9fa6b790d4",
         "price": 222.03
     }
 ]
}
```
