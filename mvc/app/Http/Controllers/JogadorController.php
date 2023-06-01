<?php

namespace App\Http\Controllers;

use App\Classes\Session;
use Illuminate\Http\Request;
use App\Classes\Database;


class JogadorController extends Controller
{
    private const AccountType = "jogador";

    public function home()
    {
        return view('jogador.home');
    }

    public function registro()
    {
        return view('jogador.registro');
    }

    public function registrar(Request $request)
    {
        Database::registerUser($request, JogadorController::AccountType);
        Session::destroySession();

        return redirect('/jogador/login');
    }

    public function login(){
        Session::checkIfThereIsAConnectedAccountOfTheSamePageAccountType(JogadorController::AccountType);
        return view('jogador.login');
    }

    public function logar(Request $request)
    {
        $user = Database::getUserByEmailAndPassword($request, JogadorController::AccountType);

        Session::setUserToSession($user, JogadorController::AccountType);
        return redirect('/jogador/lobby');
    }

    public function lobby(){
        Session::checkPermissionToAccessThePage(JogadorController::AccountType);
        return view('jogador.lobby');
    }

    public function logout()
    {
        Session::destroySession();
        return redirect('/');
    }

    public function perfil()
    {
        Session::checkPermissionToAccessThePage(JogadorController::AccountType);

        $user = Database::getUserByID($_SESSION);

        return view('perfil', ['name' => $user->name, 'email' => $user->email, 'image_address' => $user->image_address]);
    }

    public function editarPerfil()
    {
        Session::checkPermissionToAccessThePage(JogadorController::AccountType);

        $user = Database::getUserByID($_SESSION);

        return view('jogador.editar_perfil', ['name' => $user->name, 'email' => $user->email]);
    }

    public function atualizarConta(Request $request)
    {
        
        Session::checkPermissionToAccessThePage(JogadorController::AccountType);
        
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

        Session::setUserToSession($user, JogadorController::AccountType);

        return redirect("/jogador/perfil");
    }

    public function deletarConta()
    {
        Session::checkPermissionToAccessThePage(JogadorController::AccountType);

        $user = Database::getUserByID($_SESSION);
        
        $user->delete();
        
        Session::destroySession();
        
        return redirect('/');
    }

}
