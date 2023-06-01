<?php

namespace App\Exceptions;

use Exception;

use App\Exceptions\ExceptionQueryReturnNull;
use App\Exceptions\ExceptionEmailAlreadyCasdastred;
use App\Exceptions\ExceptionAccountAlreadyConnected;
use App\Exceptions\ExceptionNoAccountConnected;
use App\Exceptions\ExceptionAccountType;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;

use function Termwind\render;

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
     */
    public function register(): void
    {
        $this->reportable(function (Throwable $e) {
            
        });

        $this->renderable(function (ExceptionQueryReturnNull $e) {
            if($e->getAccountType() == "mestre")
            {
                return response()->view('mestre.login', ['erro'=> $e->getMessage()]);
            }
            else if($e->getAccountType() == "jogador")
            {
                return response()->view('jogador.login', ['erro'=> $e->getMessage()]);
            }
        });

        $this->renderable(function (ExceptionEmailAlreadyCasdastred $e) {            
            if($e->getAccountType() == "mestre" && $e->getCode() == 0)
            {
                return response()->view('mestre.registro', ['erro'=> $e->getMessage()]);
            }
            else if($e->getAccountType() == "mestre" && $e->getCode() == 1)
            {
                return redirect("mestre/perfil/editar")->with('erro', $e->getMessage());
            }


            else if($e->getAccountType() == "jogador" && $e->getCode() == 0)
            {
                return response()->view('jogador.registro', ['erro'=> $e->getMessage()]);
            }
            else if($e->getAccountType() == "mestre" && $e->getCode() == 1)
            {
                return redirect("jogador/perfil/editar")->with('erro', $e->getMessage());
            }
        });

        $this->renderable(function (ExceptionAccountAlreadyConnected $e) {            
            if($e->getAccountType() == "mestre")
            {
                return response()->view('mestre.lobby');
            }
            else if($e->getAccountType() == "jogador")
            {
                return response()->view('jogador.lobby');
            }
        });

        $this->renderable(function (ExceptionNoAccountConnected $e) {            
            if($e->getAccountType() == "mestre")
            {
                return redirect("mestre/login")->with('erro', $e->getMessage());
            }
            else if($e->getAccountType() == "jogador")
            {
                return redirect("jogador/login")->with('erro', $e->getMessage());
            }
        });

        $this->renderable(function (ExceptionAccountType $e) {            
            if($e->getAccountType() == "mestre")
            {
                return redirect("mestre/login")->with('erro', $e->getMessage());
            }
            else if($e->getAccountType() == "jogador")
            {
                return redirect("jogador/login")->with('erro', $e->getMessage());
            }
        });


        
    
    }


}
