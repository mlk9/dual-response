# Dual Response
With this package, you can operate your API and web in a single controller. (Laravel 6>=)

# Installation via composer
```sh
$ composer require mlk9/dual-response
```
then publish vendor
```sh
$ php artisan vendor:publish --tag=dual-response
```
# Documents

## Example for usage
response($webRoute //your response, $apiRoute //your json response)

BookController.php
```sh
use Mlk9\DualResponse\Facades\DualRes; 
...


/**
 * Display a listing of the resource.
 *
 * @return \Illuminate\Http\Response
 */
public function index()
{
  $books = Book::paginate(40);
  return DualRes::response(view('book.index',compact('books')),['data' => $books]);
}


```
You can change default values with pass array
## Default Response Api
```sh
'status_result' => true,
'status_code' => 200,
'message' => __('dualres.request_successful'),
'errors' => null, //removes when don't have any errors
'data' => null, //removes when don't have any data
'current_time' => now()->timestamp,
```
## Default Response When you pass to key `error`
In api routes :
```sh
'status_result' => false,
'status_code' => 400,
'message' => __('dualres.request_not_valid'),
'errors' => [//your errors],
'current_time' => now()->timestamp,
```
In web routes return your response.
## Default Response When you pass to key `data`
In api routes :
```sh
'status_result' => true,
'status_code' => 200,
'message' => __('dualres.request_successful'),
'data' => [//your data],
'current_time' => now()->timestamp,
```
In web routes return your response.
## Default Response When you pass null to key `data` (not found - 404)
In api routes :
```sh
'status_result' => false,
'status_code' => 404,
'message' => __('dualres.not_found'),
'current_time' => now()->timestamp,
```
In web routes abort 404 error.
