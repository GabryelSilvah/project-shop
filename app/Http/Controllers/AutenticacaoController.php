<?php

namespace App\Http\Controllers;

use App\Models\UsuarioModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class AutenticacaoController extends Controller
{
    public function form_login()
    {

        return view("login");
    }


    public function form_cadastro()
    {

        return view("cadastro");
    }


    public function autenticar(Request $request)
    {
        $usuario = UsuarioModel::where("email", "=", $request->email)->first();
        if (password_verify($request->senha,  $usuario->senha)) {

            $request->session()->put("usuario_logado", $usuario->email);

            return to_route("produtos.listar");
        }

        return to_route("login");
    }

    public function registrar_usuario(Request $request)
    {
        $model = new UsuarioModel();
        $model->email = $request->email;
        $model->senha = password_hash($request->senha, PASSWORD_DEFAULT);


        $model->save();
        return to_route("login");
    }

    public function sair()
    {
        return to_route("login");
    }
    public function excluir_conta() {}
}
