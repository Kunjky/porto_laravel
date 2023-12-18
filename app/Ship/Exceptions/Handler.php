<?php

declare(strict_types=1);

namespace App\Ship\Exceptions;

use Illuminate\Auth\AuthenticationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\Response;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;
use Spatie\QueryBuilder\Exceptions\InvalidFieldQuery;
use Spatie\QueryBuilder\Exceptions\InvalidFilterQuery;
use Spatie\QueryBuilder\Exceptions\InvalidIncludeQuery;
use Spatie\QueryBuilder\Exceptions\InvalidSortQuery;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Symfony\Component\HttpKernel\Exception\ServiceUnavailableHttpException;
use Throwable;

/**
 * Class Handler
 *
 * This class handles application exceptions and provides custom exception handling logic.
 */
class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<\Throwable>>
     */
    protected $dontReport = [
    ];

    /**
     * A list of exception types with their corresponding custom log levels.
     *
     * @var array<class-string<\Throwable>, \Psr\Log\LogLevel::*>
     */
    protected $levels = [
    ];

    // phpcs:disable SlevomatCodingStandard.Functions.UnusedParameter.UnusedParameter
    /**
     * Register the exception handling callbacks for the application.
     */
    public function register(): void
    {
        $this->reportable(function (Throwable $e): void {
        });
    }
    // phpcs:enable SlevomatCodingStandard.Functions.UnusedParameter.UnusedParameter

    // phpcs:disable SlevomatCodingStandard.Functions.UnusedParameter.UnusedParameter
    // phpcs:disable SlevomatCodingStandard.TypeHints.ParameterTypeHint.MissingNativeTypeHint
    /**
     * Render an exception into an HTTP response.
     *
     * @param \Illuminate\Http\Request $request Request
     * @param \Throwable               $e       Exception
     *
     * @throws \Throwable
     */
    public function render($request, Throwable $e): \Illuminate\Http\JsonResponse
    {
        switch ($e::class) {
            case InvalidUserCredentialException::class:
                return $this->responseError(trans('message.error_message.invalid_credential'), Response::HTTP_BAD_REQUEST);
            case AuthenticationException::class:
                return $this->responseError(trans('message.error_message.unauthorized'), Response::HTTP_UNAUTHORIZED);
            case ModelNotFoundException::class:
                return $this->responseError(trans('message.error_message.not_found'), Response::HTTP_NOT_FOUND);
            case MethodNotAllowedHttpException::class:
                return $this->responseError(trans('message.error_message.method_not_allowed'), Response::HTTP_METHOD_NOT_ALLOWED);
            case ValidationException::class:
                return $this->responseError(Arr::first($e->errors())[0], Response::HTTP_BAD_REQUEST);
            case InvalidSortQuery::class:
            case InvalidFilterQuery::class:
            case InvalidFieldQuery::class:
            case InvalidIncludeQuery::class:
                return $this->responseError(trans('message.error_message.common_error'), Response::HTTP_BAD_REQUEST);
            case ServiceUnavailableHttpException::class:
                return $this->responseError(trans('message.error_message.service_unavailable'), Response::HTTP_SERVICE_UNAVAILABLE);
            default:
                Log::error($e); // @phpstan-ignore-line
                return $this->responseError(
                    trans('message.error_message.internal_error'),
                    Response::HTTP_INTERNAL_SERVER_ERROR
                );
        }
    }
    // phpcs:enable SlevomatCodingStandard.Functions.UnusedParameter.UnusedParameter
    // phpcs:enable SlevomatCodingStandard.TypeHints.ParameterTypeHint.MissingNativeTypeHint

    /**
     * Handle response json error
     *
     * @param string                $message    Error message
     * @param int                   $statusCode Status code
     * @param array<mixed>          $data       Data return
     * @param array<string, string> $headers    Header response
     */
    private function responseError(
        string $message,
        ?int $statusCode = null,
        ?array $data = [],
        array $headers = ['X-Api-Response' => 'true']
    ): \Illuminate\Http\JsonResponse {
        $statusCode = $statusCode ?? Response::HTTP_BAD_REQUEST;
        $response = [
            'error_message' => $message,
            'data' => $data,
        ];

        return response()->json($response, $statusCode)->withHeaders($headers);
    }
}
