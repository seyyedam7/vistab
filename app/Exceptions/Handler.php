<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Validation\ValidationException;

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
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * @param  \Exception  $exception
     * @return void
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $exception)
    {
        if ($request->wantsJson()){
            $exception = $this->prepareException($exception);

            if ($exception instanceof ValidationException){
                return $this->renderValidationException($request, $exception);
            }

            if ($exception instanceof AuthenticationException){
                return $this->renderAuthenticateException($request, $exception);
            }

            return $this->renderOtherException($request, $exception);
        }
        return parent::render($request, $exception);
    }

    /**
     * برای ولیدیت کردن ها
     * @param $request
     * @param Exception $exception
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response|\Symfony\Component\HttpFoundation\Response
     */
    private function renderValidationException($request, $exception)
    {
        return response([
            'errors'=>$exception->errors()
        ], 422);
    }

    /**
     * برای ولیدیت کردن جیسان ها
     * @param Exception $exception
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response|\Symfony\Component\HttpFoundation\Response
     */
    private function renderOtherException($request, $exception)
    {
        $code = method_exists($exception, 'getStatusCode') ? $exception->getStatusCode() : $exception->getCode();
        $code = empty($code) ? 500 : $code;

        $message = 'something is wrong in server';

        if (!($code == 500 || empty($exception->getMessage()))){
            $message = $exception->getMessage();
        }

        return response([
            'message' => $exception->getMessage()
        ], $code);
    }

    /**
     * @param $request
     * @param Exception $exception
     * @return mixed
     */
    private function renderAuthenticateException($request, Exception $exception)
    {
        return response([
            'errors'=>"You don't have permission to see this page."
        ], 401);
    }
}
