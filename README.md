<div align='center'>

# Food Delivery App 

</div>


## How to run this project ?


#### ENV Setup 
- You have to setup database related credentials properly in .env



#### Migrate 
Just run this command

```bash
php artisan migrate
```

#### Seeder

```bash
php artisan db:seed
```

#### Run Project 
```bash
php artisan serve
```


#### API | Rider

This is POST method

```bash
http://127.0.0.1:8000/api/rider-location
```

in body

```json
{
    "rider_id" : "1",
    "restaurant_id" : "1",
    "service_name" : "CDE",
    "lat" : "24.43453",
    "long" : "55.90453"
}
```

Expected Result 

```json
{
    "success": true,
    "result": {
        "restaurant_id": "1",
        "service_name": "CDE",
        "lat": "24.43453",
        "long": "55.90453",
        "updated_at": "2024-07-26T06:22:28.000000Z",
        "created_at": "2024-07-26T06:22:28.000000Z",
        "id": 3
    },
    "message": "Rider location stored successfully"
}

```




#### API | Restuarant

Mehotd: Get

```bash
http://127.0.0.1:8000/api/nearest-rider/1
```


Result 



```json
{
    "rider_id": 1,
    "distance": 0.1234

}
```

or 

```json
{
    "success": false,
    "message": "No riders found nearby"
}
```
