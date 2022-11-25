<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;
use App\Http\Common\UtilClass;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Http\Exceptions\HttpResponseException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class Handler extends ExceptionHandler
{
    /**
     * A list of exception types with their corresponding custom log levels.
     *
     * @var array<class-string<\Throwable>, \Psr\Log\LogLevel::*>
     */
    protected $levels = [
        //
    ];

    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<\Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    public function render($request, $exception)
    {
        /**
         * APIエラーの場合、apiErrorResponseをcall
         * WEBエラーの場合、何もしない！！！
         */
        if ($request->is('api/*')) {
            return $this->apiErrorResponse($request, $exception);
        }

        return parent::render($request, $exception);
    }

    private function apiErrorResponse($request, $exception)
    {
        // api認証エラー
        if ($exception instanceof AuthenticationException) {
            $statusCode = 401;
        } else if ($exception instanceof NotFoundHttpException) {
            $statusCode = 404;
        } else if ($exception instanceof HttpResponseException) {
            // apiバリデーションエラー
            $statusCode = 422;
        } else {
            $statusCode = 500;
        }

        return response()->json(
            UtilClass::formatResponseData(
                $statusCode,
                $this->getErrorMessage($statusCode, $exception)
            )
            , $statusCode, ['Content-Type' => 'application/json'], JSON_UNESCAPED_SLASHES);
    }

    private function getErrorMessage($statusCode, $exception): string
    {
        switch ($statusCode) {
            case 401:
                return '認証エラーが発生しました';
            case 404:
                return '存在しないページです';
            case 422:
                return $exception->getMessage();
            case 500:
                return 'エラーが発生しました';
            default:
                return 'エラーが発生しました';
        }
    }
}
