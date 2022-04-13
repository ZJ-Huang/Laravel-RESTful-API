<?php

namespace App\Exceptions;

use App\Traits\ApiResponseTrait;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Throwable;

class Handler extends ExceptionHandler
{
    use ApiResponseTrait;

    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
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

    public function render($request, Throwable $exception)
    {
      if ($request->expectsJson()) {
         if ($exception instanceof ModelNotFoundException) {
           return $this->errorResponse(
              '找不到資源',
              Response::HTTP_NOT_FOUND
           );
         }
      }

      if ($request->expectsJson()) {
         if ($exception instanceof NotFoundHttpException) {
           return $this->errorResponse(
              '無法找到此網址',
              Response::HTTP_NOT_FOUND
           );
         }
      }

      if ($request->expectsJson()) {
         if ($exception instanceof MethodNotAllowedHttpException) {
           return $this->errorResponse(
              $exception->getMessage(),
              Response::HTTP_METHOD_NOT_ALLOWED
           );
         }
      }

      return parent::render($request, $exception);
    }
}
