## Privilee Rest API

### Installation 
Please follow instructions given below to setup project:
1. Clone repository `git clone https://github.com/erviveksharma/privilee-rest-api.git`
2. Install composer dependencies `composer install`
3. Copy .env.example & create .env `cp .env.example .env`
4. Update permissions as below, these folders should belong to www-data (webserver) group.  
	```
	chmod -R 775 storage
    chmod -R 775 bootstrap/cache
    ```

### Usages

1. Import CSV with following command `php artisan import:csv <filepath>`
	eg. `php artisan import:csv public/sample-data.csv`

2. Fetch JSON data using apis. 

	```
	curl --location --request GET 'https://your-app-url.com/api/search?id=1&name=the&discount_percentage=25' \
	--header 'Accept: application/json'
	```

### Improvements / Future scopes

1. The ImportCSVController.php can be removed ( or it can serve for a web interface to upload csv in future scope.)
2. Save JSON response to XML and serve results from XML ( XML packages can be used from laravel.)
3. Cli utility can be more descriptive with error and success messages and logs. 
4. Unit tests can be placed for services. 
5. A postman collection with different combination of parameters can be provided. 
6. Currently there are no ratelimits as well as max upload guard limits. which should be placed to protect threats and attacks on api and cli command. 
