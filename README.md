<p align="center"><img src="https://res.cloudinary.com/dtfbvvkyp/image/upload/v1566331377/laravel-logolockup-cmyk-red.svg" width="400"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## Steps to run application

- Run migrations:
```
     php artisan migrate
```

- Run seeds
```
     php artisan db:seed
```

- Execute the following command:

```
     php artisan queue:work --queue=high,default
```

- List routes
```
  - GET /api/clients
  - GET /api/payments?client={id}
  - POST /api/clients => {
    expires_at date (YYYY-MM-D)
    user_id integer
  }
```


