<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Models\UsuarioModel;

class LogInController extends Controller {

    public function index() {

        return view('login');
    }

    public function verificar(Request $request) {


        $Usuario = UsuarioModel::where('correo', $request->email)->where('password', md5($request->password))->get();
        if (count($Usuario) > 0) {
            $verificado = 0;
            foreach ($Usuario as $us) {
                $_SESSION['idUsuario'] = $us->id;
                $_SESSION['nombre'] = $us->nombres . " " . $us->apellidos;
                $verificado = $us->verificado;
            }
            if ($verificado == 1) {
                $Usuario = UsuarioModel::find($_SESSION['idUsuario']);
                $Usuario->ultimo_acceso = date("Y-m-d H:i:s");
                $Usuario->save();
                return redirect(url('/') . '/usuarios');
            } else {
                return redirect(url('/') . '?mensaje=' . base64_encode('Tiene que verificar su suario a traves del correo'));
            }
        } else {
            return redirect(url('/') . '?mensaje=' . base64_encode('Usuario o password Incorrectos'));
        }
    }

    public function cerrarSesion() {
        session_destroy();

        return redirect(url('/'));
    }

    public function verificarCorreo() {
        $Usuario = UsuarioModel::where('token', $_GET['token'])->get();

        $idUsuario = 0;
        foreach ($Usuario as $us) {
            $idUsuario = $us->id;
        }
        if ($idUsuario == 0) {
            return redirect(url('/') . '?mensaje=' . base64_encode('No se pudo verificar el correo'));
        } else {
            $Usuario = UsuarioModel::find($idUsuario);
            $Usuario->verificado = 1;
            $Usuario->save();
            return redirect(url('/') . '?mensaje=' . base64_encode('Correo verificado. Ya puede Ingresar'));
        }
    }

}
