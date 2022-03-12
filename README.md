# Dual Response
With this package, you can operate your API and web in a single controller. (Laravel 6>=)

# Installation via composer
```sh
$ composer require mlk9/dual-response
```

# Documents
## Default Response Api
```sh
'status_result' => true,
'status_code' => 200,
'message' => __('dualres.request_successful'),
'errors' => null, //removes when don't have any errors
'data' => null, //removes when don't have any data
'current_time' => now()->timestamp,
```
when we have an error in response , automaticly pass code and error 
