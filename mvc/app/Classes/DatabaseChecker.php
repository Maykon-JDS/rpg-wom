<?php

namespace App\Classes;

use Exception;
use App\Exceptions\ExceptionQueryReturnNull;
use App\Exceptions\ExceptionEmailAlreadyCasdastred;


class DatabaseChecker
{
    static public function queryCheck($user, $accountType) : void
    {
        if($user == null){
            throw new ExceptionQueryReturnNull("Usuário e/ou senha inválidos.", $accountType); 
        }
    }

    static public function checkIfEmailIsAlreadyUsed($user, $accountType, $errorCode = 0) : void
    {
        if($user != null && $errorCode == 0){
            throw new ExceptionEmailAlreadyCasdastred("E-mail já cadastrado, não é possivel criar outro usúario com o mesmo e-mail.", $accountType, $errorCode); 
        }
        if($user != null && $errorCode == 1){
            throw new ExceptionEmailAlreadyCasdastred("E-mail já cadastrado, não é possivel atualizar para este e-mail.", $accountType, $errorCode); 
        }
    }
}
