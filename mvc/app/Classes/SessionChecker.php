<?php

namespace App\Classes;

use App\Exceptions\ExceptionAccountAlreadyConnected;
use App\Exceptions\ExceptionNoAccountConnected;
use App\Exceptions\ExceptionAccountType;
use Exception;

class SessionChecker
{
    static public function checkIfThereIsAConnectedAccountOfTheSamePageAccountType ($accountType) : void
    {
        if (isset($_SESSION['id']) && $_SESSION['tipo'] == $accountType) {
            throw new ExceptionAccountAlreadyConnected($accountType);
        }

    }

    static public function checkPermissionToAccessThePage ($accountType) : void
    {
        
        if (isset($_SESSION['id']) == null) {
            throw new ExceptionNoAccountConnected( "Para acessar a página \"" . $_SERVER['REQUEST_URI'] . "\" deve estar logado.", $accountType);
        }

        if(isset($_SESSION['id']) && $_SESSION['tipo'] != $accountType){
            throw new ExceptionAccountType( "O usuário atual é do tipo " . ucwords($_SESSION['tipo']) . " e só possui acesso a páginas do mesmo tipo.", $accountType);
        }
    } 
}
