<?php 

namespace App\Exceptions;

use Exception;

class ExceptionAccountType extends Exception{

    protected string $accountType;

    function __construct(string $message = "", string $accountType = "", int $code = 0)
    {
        $this->message = $message;
        $this->accountType = $accountType;
        $this->code = $code;
    } 

    public function getAccountType() : string
    {
        return $this->accountType;
    }
}



?>