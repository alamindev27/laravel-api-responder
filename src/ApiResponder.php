<?php

namespace Alamindev27\ApiResponder;
use Illuminate\Support\Facades\Config;

class ApiResponder
{
    // Success response
    public function success($data = [], $message = null, $meta = [])
    {
        $response = [
            'status' => Config::get('api-responder.success_status', true),
            'message' => $message ?? Config::get('api-responder.success_message', 'Success'),
            'data' => $data,
        ];

        if (!empty($meta)) {
            $response['meta'] = $meta;
        }

        return response()->json($response);
    }

    // Error response
    public function error($data = [], $message = null, $meta = [], $code = null)
    {
        $response = [
            'status' => $code ?? Config::get('api-responder.error_status', false),
            'message' => $message ?? Config::get('api-responder.error_message', 'Something went wrong'),
            'data' => $data,
        ];

        if (!empty($meta)) {
            $response['meta'] = $meta;
        }

        return response()->json($response, $code);
    }

    // Validation error response
    public function validationError($errors = [], $message = null, $meta = [], $code = null)
    {
        $response = [
            'status' => $code ?? Config::get('api-responder.error_status', false),
            'message' => $message,
            'errors' => $errors,
        ];

        if (!empty($meta)) {
            $response['meta'] = $meta;
        }

        return response()->json($response, $code);
    }

    // Pagination response
    public function paginate($data, $message = null, $meta = [], $code = null)
    {
        $response = [
            'status' => $code ?? Config::get('api-responder.success_status', true),
            'message' => $message,
            'data' => $data->items(),
            'pagination' => [
                'total' => $data->total(),
                'per_page' => $data->perPage(),
                'current_page' => $data->currentPage(),
                'last_page' => $data->lastPage(),
            ],
        ];

        if (!empty($meta)) {
            $response['meta'] = $meta;
        }

        return response()->json($response);
    }
}
