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

Require the package using Composer:

```bash
composer require alamindev27/api-responder
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
use ApiResponder;

return ApiResponder::success(
    ['name' => 'Amin'], 
    'API working'
);
```

## Output:

```bash
{
    "status": true,
    "message": "API working",
    "data": {
        "name": "Amin"
    }
}
```

## Error Response

```bash
return ApiResponder::error('Something went wrong', [], 400);
```

## Output:
```bash
{
    "status": false,
    "message": "Something went wrong",
    "data": []
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
    "status": false,
    "message": "Validation Error",
    "errors": {
        "email": ["The email field is required."]
    }
}
```

## Paginated Response
```bash
$data = User::paginate(10);
return ApiResponder::paginate($data);
```

## Output:
```bash
{
    "status": true,
    "message": "Data retrieved successfully",
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
MIT License © MD Al-Amin

