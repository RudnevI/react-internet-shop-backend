## Backend for react study project

### Установка:

```php
composer install
php artisan key:generate
php artisan migrate
```

### Эндпоинты:

-   `/api/products/all` - получение всех товаров
-   `/api/categories/all` - получение всех категорий товаров
-   `/api/products/filter` - фильтрация товаров
-   `/api/categories/filter` - фильтрация категорий товаров
-   `/api/products/search/{search-value}` - поиск по продуктам
