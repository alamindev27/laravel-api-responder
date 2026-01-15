# Laravel API Responder

A simple, consistent, and customizable API response helper for Laravel applications.  
It provides standard JSON responses for success, error, validation errors, and paginated data.

---

## Features

- Standardized JSON API responses
- Success responses with optional custom messages
- Error responses with HTTP status codes
- Validation error responses
- Paginated data responses
- Configurable via `config/api-responder.php`
- Supports Laravel 10, 11, 12
- Easy to use Facade

---

## Installation

Install via Packagist:
<a href='https://packagist.org/packages/alamindev27/laravel-api-responder'>https://packagist.org/packages/alamindev27/laravel-api-responder</a>

<i>OR</i>

Require the package using Composer:

```bash
composer require alamindev27/laravel-api-responder
```

Local development: If you are developing locally, use a path repository in your Laravel project `composer.json`:

```
"repositories": [
    {
        "type": "path",
        "url": "packages/laravel-api-responder"
    }
]
```
Then run:
```bash
composer update
```

## Publish Config (Optional)

You can publish the config file to customize messages and response structure:

```bash
php artisan vendor:publish --provider="Alamindev27\ApiResponder\ApiResponderServiceProvider" --tag=config

```

This will create config/api-responder.php.
You can change default success/error messages, status keys, and pagination keys there.

## Usage

Success Response

```bash
use Alamindev27\ApiResponder\Facades\ApiResponder;

$datas = [
    'name' => 'MD Al-Amin', 'email' => 'alamindev27@gmail.com', 'age' => 26, 'profession' => 'Web Developer'
];

$meta = [
    "request_id" => "64f8a2c1e4d7a"
];

$message = 'Data fatch Successfully';

return ApiResponder::success($datas, $message, $meta, 200);
```

## Output:

```bash
{
    "status": 200,
    "message": "Data fatch Successfully",
    "data": {
        "name": "Al-Amin",
        "email": "alamindev27@gmail.com",
        "age": "27"
    },
    "meta": [
        "request_id":"64f8a2c1e4d7a"
    ]
}
```

## Error Response

```bash

    return ApiResponder::error('Something went wrong', [], 400);
```

## Output:
```bash
{
    "status": 400,
    "message": "Something went wrong",
    "data": [],
    "meta": []
}

```

## Validation Error Response

```bash
return ApiResponder::validationError([
    'email' => ['The email field is required.']
]);
```

## Output:
```bash
{
    "status": 422,
    "message": "Validation Error",
    "errors": {
        "email": ["The email field is required."]
    }
}
```

## Paginated Response
```bash
$data = User::paginate(10);
$meta = [
    "request_id" => "64f8a2c1e4d7a"
];

$message = 'Pagination data fatch Successfully';

return ApiResponder::paginate($data, $message, $meta, 200);
```

## Output:
```bash
{
    "status": 200,
    "message": "Pagination data fatch Successfully",
    "data": [ /* user items */ ],
    "pagination": {
        "total": 100,
        "per_page": 10,
        "current_page": 1,
        "last_page": 10
    }
}
```

## Configuration
The config file config/api-responder.php allows you to customize default response structure:
```bash
return [
    'success_status' => true,
    'success_message' => 'Success',
    'error_status' => false,
    'error_message' => 'Something went wrong',
    'pagination_keys' => [
        'data' => 'data',
        'total' => 'total',
        'per_page' => 'per_page',
        'current_page' => 'current_page',
        'last_page' => 'last_page',
    ],
    "meta": [
        "request_id":"64f8a2c1e4d7a"
    ]
];
```

## Testing
This package includes PHPUnit tests using Orchestra Testbench
Run tests:
```bash
vendor/bin/phpunit
```

## Requirements

PHP 8.1+

Laravel 10, 11, 12

## Contributing
Feel free to fork this repository and submit pull requests.
Please follow PSR-12 coding standards and write tests for new features.

## License
MIT License © <a href='https://alamindev27.com'>MD Al-Amin</a>

