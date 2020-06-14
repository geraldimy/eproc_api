# Bulog Kita API

*Author : M. Farhan Hanif, Geraldi M. Yushar, Lukito P. Hajid, A. Haydar Ardabell, Tjokorda Raka W. W.*

## Routes

| Route             | Method | Params   | Response                                                  |
|-------------------|--------|----------|-----------------------------------------------------------|
| /api/rpk          | GET    | lat, lng | Returns 5 closest RPK Location from the given coordinates |
| /api/rpk/id       | GET    |          | Returns RPK details                                       |
| /api/products     | GET    |          | Returns All products                                      |
| /api/products/id  | GET    |          | Returns details of the product                            |
| /api/promo        | GET    |          | Returns All promo within its active periods               |
| /api/promo/id     | GET    |          | Returns detail promo within its active periods            |

Web Admin Bulog Setup :

1.) composer require install
2.) php artisan migrate
3.) php artisan db:seed
4.) php artisan serve
5.) Login Admin
    username = adminbulog@gmail.com
    password = admin

