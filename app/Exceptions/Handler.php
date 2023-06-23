<?php

namespace App\Exceptions;

use App\Http\Traits\ApiResponseTrait;
use App\Http\Traits\WebErrorsTrait;
use GuzzleHttp\Exception\ServerException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Validation\UnauthorizedException;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpKernel\Exception\ServiceUnavailableHttpException;
use Throwable;

class Handler extends ExceptionHandler
{
    use ApiResponseTrait;
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
        $this->renderable(function (NotFoundHttpException $e , $request) {
            if ($request->is('api/*'))
            {
                return $this->apiResponse(404 , 'Not found' , $request->url().' Not Found, try with correct url');
            }else{
                return response(view('errors.404'));
            }
        });

        $this->renderable(function (MethodNotAllowedHttpException $e , $request) {
            if ($request->is('api/*'))
            {
                    return $this->apiResponse(403, "error 403", $request->method() . 'method Not allow for this route, try again with correct method ');

            }else{
                return response(view('errors.403'));
            }
        });

        $this->renderable(function (UnauthorizedException $e , $request) {
            if ($request->is('api/*'))
            {
                return $this->apiResponse(401, "error 401", $request->method() . 'Unauthorized');

            }else{
                return response(view('errors.401'));
            }
        });

        $this->renderable(function (ServerException $e , $request) {
            if ($request->is('api/*'))
            {
                return $this->apiResponse(500, "error 500", $request->method() . 'Server Error');

            }else{
                return response(view('errors.500'));
            }
        });

        $this->renderable(function (ServiceUnavailableHttpException $e , $request) {
            if ($request->is('api/*'))
            {
                return $this->apiResponse(503, "error 503", $request->method() . 'Service Unavailable');

            }else{
                return response(view('errors.503'));
            }
        });
    }



}
