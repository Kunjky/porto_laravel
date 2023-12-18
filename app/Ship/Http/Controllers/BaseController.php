<?php

declare(strict_types=1);

namespace App\Ship\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

/**
 * Class BaseController
 *
 * This class serves as the base controller for all other controllers in the application.
 */
class BaseController extends Controller
{
    use AuthorizesRequests;
    use ValidatesRequests;

    /**
     * Response structure json success.
     *
     * @param mixed                 $data       Data return
     * @param int                   $statusCode Status code 2xx:200, 201
     * @param array<string, string> $headers    Header response
     */
    protected function responseSuccess(
        mixed $data = [],
        int $statusCode = Response::HTTP_OK,
        array $headers = ['X-Api-Response' => 'true']
    ): JsonResponse {
        $response = [
            'error_message' => null,
            'data' => $data,
        ];

        return response()->json($response, $statusCode)->withHeaders($headers);
    }

    /**
     * Response structure json error.
     *
     * @param string                $message    Message error
     * @param int                   $statusCode Status code
     * @param array<mixed>          $data       Data return
     * @param array<string, string> $headers    Header response
     */
    protected function responseError(
        string $message,
        int $statusCode = Response::HTTP_BAD_REQUEST,
        array $data = [],
        array $headers = ['X-Api-Response' => 'true']
    ): JsonResponse {
        $response = [
            'error_message' => $message,
            'data' => $data,
        ];

        return response()->json($response, $statusCode)->withHeaders($headers);
    }
}
