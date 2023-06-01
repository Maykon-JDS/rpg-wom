<?php

namespace App\Classes;
use App\Classes\Account;

class Session
{

    static public function startSession() : void
    {
        ini_set("session.cookie_httponly", 1);
        ini_set("session.cookie_secure", 1);
        session_name('WOM');
        session_start();
    }

    static public function destroySession() : void
    {
        if (isset($_SESSION['id'])) {
            session_destroy();
        }
    }

    static public function checkIfThereIsAConnectedAccountOfTheSamePageAccountType($accountType) : void
    {
        SessionChecker::checkIfThereIsAConnectedAccountOfTheSamePageAccountType($accountType);
    }
    
    static public function checkPermissionToAccessThePage($accountType) : void
    {
        SessionChecker::checkPermissionToAccessThePage($accountType);
    }

    static public function setUserToSession($account, $accountType) : void
    {
        $_SESSION['id'] = $account->id;
        $_SESSION['tipo'] = $accountType;        
    }
    
}
