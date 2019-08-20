<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;

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
        if ($exception instanceof UnauthorizedHttpException) {
            $preException = $exception->getPrevious();
            if ($preException instanceof
                \Tymon\JWTAuth\Exceptions\TokenExpiredException) {
                return response()->json(['token_expired'], $exception->getStatusCode());
            } else if ($preException instanceof
                \Tymon\JWTAuth\Exceptions\TokenInvalidException) {
                return response()->json(['token_invalid'], $exception->getStatusCode());
            } else if ($preException instanceof
                \Tymon\JWTAuth\Exceptions\TokenBlacklistedException) {
                return response()->json(['token_blacklisted'], $exception->getStatusCode());
            }
            if ($exception->getMessage() === 'Token not provided') {
                return response()->json(['token_not_provided'], $exception->getStatusCode());
            }
        }

        if($this->isHttpException($exception))
        {
            switch ($exception->getStatusCode())
            {
                // not found
                case 404:
                    return redirect()->guest('home');
                    break;

                // internal error
                /*case '500':
                    return redirect()->guest('home');
                    break;*/

                /*default:
                    return $this->renderHttpException($e);
                    break;*/
            }
        }

        return parent::render($request, $exception);
    }
}
