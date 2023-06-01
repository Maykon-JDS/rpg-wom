<?php 

namespace App\Exceptions;

use Exception;

class ExceptionAccountAlreadyConnected extends Exception{

    protected string $accountType;

    function __construct(string $accountType = "", string $message = "", int $code = 0)
    {
        $this->accountType = $accountType;
        $this->message = $message;
        $this->code = $code;
    } 

    public function getAccountType() : string
    {
        return $this->accountType;
    }
}



?>