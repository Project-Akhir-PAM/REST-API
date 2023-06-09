<?php

namespace App\Exceptions;

use Throwable;
use App\Libraries\ResponseBase;
use Illuminate\Support\Facades\App;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;

class Handler extends ExceptionHandler
{
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
        $this->renderable(function (Throwable $e) {
            if ($e instanceof NotFoundHttpException && str_contains($e->getMessage(), 'model')) {
                $firstIndex = strpos($e->getMessage(), "Models\\") + 7;
                $lastIndex = strpos($e->getMessage(), "]");
                $model = substr($e->getMessage(), $firstIndex, $lastIndex - $firstIndex);
                
                return ResponseBase::error("Id $model tidak ditemukan", 409);
            } else if ($e instanceof ModelNotFoundException) {
                return ResponseBase::error('Data tidak ditemukan', 404);
            } else if ($e instanceof NotFoundHttpException) {
                return ResponseBase::error('Url tidak ditemukan', 404);
            } else if ($e instanceof MethodNotAllowedHttpException) {
                return ResponseBase::error('Method tidak diizinkan', 405);
            } else {
                return ResponseBase::error('Internal server error', 500);
            }
        });
    }
}
