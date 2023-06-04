<?php

namespace App\Classes;

use App\Models\UserMestreModel;
use App\Models\UserJogadorModel;
use Illuminate\Support\Str;

class Database
{
    static public function registerUser($request, $accountType) : void
    {
        $userWithTheSameEmail = Database::getUserByEmail($request, $accountType);
        
        DatabaseChecker::checkIfEmailIsAlreadyUsed(
            $userWithTheSameEmail, 
            $accountType
        );
        
        $database = Database::getTable($accountType);

        $database->name = $request->nome;
        $database->email = Str::lower($request->email);
        $database->password = $request->senha;

        $database->save();
    } 

    static private function getUserByEmail($request, $accountType) : UserMestreModel | UserJogadorModel | null
    {
        $database = Database::getTable($accountType);
        

        $email =  $request['email'];
        $user = $database->where('email', $email)->first();
        
        return $user;
    }


    static public function getUserByID($request) : UserMestreModel | UserJogadorModel
    {

        $database = Database::getTable($request);        

        $id =  $request['id'];
        $user = $database->where('id', $id)->first();
        
        return $user;
    }

    static public function getUserByEmailAndPassword($request, $accountType) : UserMestreModel | UserJogadorModel
    {
        $database = Database::getTable($accountType);
        

        $email =  $request['email'];
        $password = $request['password'];

        $user = $database
        ->where('email', Str::lower($email))
        ->where('password', $password)->first();

        DatabaseChecker::queryCheck($user, $accountType);

        return $user;
    }

    static public function updateUser($request, $newData, $imagemAddress = "") : void
    {
        $user = Database::getUserByID($request);

        $accountType = $request['tipo'];

        if($user->email != $newData['email']){
            DatabaseChecker::checkIfEmailIsAlreadyUsed(
                Database::getUserByEmail($newData, $accountType), 
                $request['tipo'], 1
            );
        }
        

        $name =  $newData['nome'];
        $email =  $newData['email'];

        
        $user->name = $name;
        $user->email = Str::lower($email);
        $user->image_address = $imagemAddress;

        $user->save();
    }

    static private function getTable($request)
    {
        

        $table = $request['tipo'] ?? $request;
        
        switch ($table) {
            case 'mestre':
                    return new UserMestreModel();
                break;
            
            case 'jogador':
                    return new UserJogadorModel();
                break;    

            default:
                return "não encontrado";
                break;
        }
    }
    
    

}
