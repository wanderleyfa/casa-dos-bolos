<?php

namespace App\Exceptions;

use App\Traits\ApiResponserTrait;
use BadMethodCallException;
use ErrorException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Throwable;

class Handler extends ExceptionHandler
{
    use ApiResponserTrait;

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
        $this->renderable(function (Throwable $e, $request) {
            if ($e->getPrevious() instanceof ErrorException) {
                return $this->errorResponse([], 500, 'Failed to fetch property :'.$e->getPrevious()->getTraceAsString());
            }
            if ($request->is('api/*')) {
                if ($e instanceof QueryException) {
                    return $this->errorResponse([], 422, 'Failed to execute query on database :'.$e->getPrevious()->getMessage());
                }

                if ($e->getPrevious() instanceof ErrorException) {
                    return $this->errorResponse([], 500, 'Failed to fetch property :'.$e->getPrevious()->getTraceAsString());
                }

                if ($e->getPrevious() instanceof BadMethodCallException) {
                    return $this->errorResponse([], 500, 'The method call is undefined :'.$e->getPrevious()->getTraceAsString());
                }

                if ($e->getPrevious() instanceof ModelNotFoundException) {
                    return $this->errorResponse([], 404, 'Failed to retrieve model instance : '.str_replace('App\\Models\\', '', $e->getPrevious()->getModel()));
                }

                if ($e->getPrevious() instanceof MethodNotAllowedHttpException) {
                    return $this->errorResponse([], 405, 'The method specified for the request is invalid');
                }

                if ($e->getPrevious() instanceof ErrorException) {
                    return $this->errorResponse([], 500, 'Failed to fetch property :'.$e->getPrevious()->getTraceAsString());
                }
            }

             return $this->errorResponse([], 404, 'Destination not found');
        });
    }
}
