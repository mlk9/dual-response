# Dual Responses
one do and two response , return different api and web route in a controller with this package

# Installation via composer
```sh
$ composer require mlk9/dual-responses
```

# Documents
## Default Response Api
```sh
'status' => true,
'code' => 200,
'message' => _('request_successful'),
'errors' => [],
'data' => null,
'time' => now()->timestamp,
```
when we have an error in response , automaticly pass code and error 
