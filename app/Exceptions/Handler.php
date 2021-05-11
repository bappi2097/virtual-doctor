<?php

namespace App\Exceptions;

use Throwable;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
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
        if ($this->isUnauthorized($exception)) {
            Toastr::error("Already Informd to Admin.", "Something went wrong.");
            return redirect(dashboardURL());
        }
        return parent::render($request, $exception);
    }

    public function isUnauthorized(Throwable $exception)
    {
        if ($exception instanceof \Spatie\Permission\Exceptions\UnauthorizedException) {
            if (auth()->check()) {
                return true;
            }
        }
        return false;
    }
}
