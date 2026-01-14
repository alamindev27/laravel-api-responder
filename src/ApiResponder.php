<?php

namespace Alamindev27\ApiResponder;
use Illuminate\Support\Facades\Config;

class ApiResponder
{
    public function success($data = [], string $message = null)
    {
        return response()->json([
            'status' => Config::get('api-responder.success_status', true),
            'message' => $message ?? Config::get('api-responder.success_message', 'Success'),
            'data' => $data,
        ]);
    }

    public function error(string $message = null, $data = [], int $code = 400)
    {
        return response()->json([
            'status' => Config::get('api-responder.error_status', false),
            'message' => $message ?? Config::get('api-responder.error_message', 'Something went wrong'),
            'data' => $data,
        ], $code);
    }

    public function validationError($errors = [], string $message = 'Validation Error', int $code = 422)
    {
        return response()->json([
            'status' => Config::get('api-responder.error_status', false),
            'message' => $message,
            'errors' => $errors,
        ], $code);
    }

    public function paginate($data, $message = 'Data retrieved successfully')
    {
        return response()->json([
            'status' => Config::get('api-responder.success_status', true),
            'message' => $message,
            'data' => $data->items(),
            'pagination' => [
                'total' => $data->total(),
                'per_page' => $data->perPage(),
                'current_page' => $data->currentPage(),
                'last_page' => $data->lastPage(),
            ]
        ]);
    }
}
