<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default API Response Structure
    |--------------------------------------------------------------------------
    |
    | Customize your default API response keys and messages here.
    |
    */

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
