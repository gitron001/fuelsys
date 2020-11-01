<?php

namespace App\Exceptions;

use Exception;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;


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

        $this->sendEmail($exception);
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
        return parent::render($request, $exception);
    }

    private function sendEmail($e)
    {
        if(strpos($e->getTraceAsString(),'#0 /var/www/html/adminpanel/vendor/laravel/framework/src/Illuminate/Routing/Router.php(619)')===false
            && strpos($e->getMessage(),'#0 /var/www/html/adminpanel/vendor/laravel/framework/src/Illuminate/Routing/Router.php(619)')===false
            && strpos($e->getMessage(),'Unauthenticated') === false){
            $body = "[".date("Y-m-d H:i:s",time())."] Fatal error on fuel system . " ;
            if (!App::runningInConsole())
            {
                $body .= "
                    Request url : ".\Request::url()."
                    Request dump ".json_encode(\Request::all())."
                ";
            }
            $body.="Error message : ". $e->getMessage()."
                    Debug stacktrace :
                    " . $e->getTraceAsString();
            try {
				/*Mail::raw($body, function ($m) {
					$emails = ['ideal.bakija@gmail.com','orgesthaqi96@gmail.com'];
                    $m->from('ideal.bakija@bakija.com', 'Fuel System');

                    $m->to($emails)->subject("Fatal error - NESIM BAKIJA");
                });*/
            } catch (\Exception $e) {

            }
        }
    }
}
