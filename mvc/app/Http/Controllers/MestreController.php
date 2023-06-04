<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Classes\Session;
use App\Classes\Database;

class MestreController extends Controller
{
    private const AccountType = "mestre";

    public function home()
    {
        return view('mestre.home');
    }

    public function registro()
    {
        return view('mestre.registro');
    }

    public function registrar(Request $request)
    {
        Database::registerUser($request, MestreController::AccountType);
        Session::destroySession();

        return redirect('/mestre/login');
    }

    public function login()
    {
        Session::checkIfThereIsAConnectedAccountOfTheSamePageAccountType(MestreController::AccountType);
        return view('mestre.login');
    }

    public function logar(Request $request)
    {
        $user = Database::getUserByEmailAndPassword($request, MestreController::AccountType);

        Session::setUserToSession($user, MestreController::AccountType);
        return redirect('/mestre/lobby');
    }

    public function logout()
    {
        Session::destroySession();
        return redirect('/');
    }

    public function lobby()
    {
        Session::checkPermissionToAccessThePage(MestreController::AccountType);

        return view('mestre.lobby');
    }

    public function perfil()
    {
        Session::checkPermissionToAccessThePage(MestreController::AccountType);

        $user = Database::getUserByID($_SESSION);

        return view('perfil', ['name' => $user->name, 'email' => $user->email, 'image_address' => $user->image_address]);
    }

    public function editarPerfil()
    {
        Session::checkPermissionToAccessThePage(MestreController::AccountType);

        $user = Database::getUserByID($_SESSION);

        return view('mestre.editar_perfil', ['name' => $user->name, 'email' => $user->email]);
    }

    public function atualizarConta(Request $request)
    {
        Session::checkPermissionToAccessThePage(MestreController::AccountType);
        
        $files = $_FILES;
        
        $upload = new \CoffeeCode\Uploader\Image("galeria", "images");
        
        if (!empty($files["imagem"])) {
            $file = $files["imagem"];
            

            if(!empty($file["type"])){
                if (in_array($file["type"], $upload::isAllowed())) {
                    $imagemAddress = $upload->upload($file, pathinfo($file['name'],  PATHINFO_FILENAME), 400);
                    echo "<img src='/{$imagemAddress}'>";
                } 
                else {
                    echo "<p>Selecione uma imagem válida</p>";
                }
            }
            
        }
        
        Database::updateUser($_SESSION, $request, $imagemAddress ?? "");

        $user = Database::getUserByID($_SESSION);

        Session::setUserToSession($user, MestreController::AccountType);

        return redirect("/mestre/perfil");
    }

    public function deletarConta()
    {
        Session::checkPermissionToAccessThePage(MestreController::AccountType);

        $user = Database::getUserByID($_SESSION);
        
        $user->delete();
        
        Session::destroySession();
        
        return redirect('/');
    }
}
