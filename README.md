# Bulog Kita API

*Author : M. Farhan Hanif, Geraldi M. Yushar, Lukito P. Hajid, A. Haydar Ardabell, Tjokorda Raka W. W.*

## Routes

| Route             | Method | Params   | Headers               | Response                                                  |
|-------------------|--------|----------|-----------------------|-----------------------------------------------------------|
| /api/rpk          | GET    | lat, lng |                       | Returns 5 closest RPK Location from the given coordinates |
| /api/products     | GET    |          | Authorization='token' | Returns All products                                      |
| /api/products/id  | GET    |          | Authorization='token' | Returns details of the product                            |
| /api/promo        | GET    |          | Authorization='token' | Returns All promo within its active periods               |
| /api/promo/id     | GET    |          | Authorization='token' | Returns detail promo within its active periods            |

