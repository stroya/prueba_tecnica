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

class UsuarioController extends Controller {

    public function index() {
        if (!isset($_SESSION['nombre'])) {
            return redirect(url('/'));
        }
        $datos['titulo'] = 'Administración de Usuarios';
        $datos['lista'] = UsuarioModel::all();
        return view('vista', $datos);
    }

    public function editar($id) {
        if (!isset($_SESSION['nombre'])) {
            return redirect(url('/'));
        }
        $datos['usuario'] = UsuarioModel::find($id);
        $datos['titulo'] = 'Administración de Usuarios';
        return view('formularioEdicion', $datos);
    }

    public function actualizar(Request $request) {


        $Usuario = UsuarioModel::find($request->idUsuario);
        if ($request->password != "**--**") {
            $Usuario->password = md5($request->password);
        }
        $Usuario->nombres = $request->nombres;
        $Usuario->apellidos = $request->apellidos;
        $Usuario->direccion = $request->direccion;
        $Usuario->correo = $request->correo;
        $Usuario->fecha_nacimiento = $request->fechaNacimiento;
        $Usuario->save();

        return redirect(url('/') . '/usuarios?mensaje=' . base64_encode("Usuario Actualizado con éxito"));
    }

    public function recuperarPassword(Request $request) {



        $Usuario = UsuarioModel::where('correo', $request->correo)->get();
        $idUsuario = 0;
        foreach ($Usuario as $us) {
            $idUsuario = $us->id;
        }

        if ($idUsuario == 0) {
            return redirect(url('/') . "?mensaje=" . base64_encode("Este correo no esta registrado"));
        } else {
            $Usuario = UsuarioModel::find($idUsuario);
            $Usuario->password = md5($request->password);
            $Usuario->save();
            return redirect(url('/') . "?mensaje=" . base64_encode("Password cambiado exitosamente"));
        }
    }

    public function ingresar(Request $request) {

        $token = md5($request->correo . $request->fechaNacimiento);
        $Usuario = new UsuarioModel();
        $Usuario->password = md5($request->password);
        $Usuario->nombres = $request->nombres;
        $Usuario->apellidos = $request->apellidos;
        $Usuario->direccion = $request->direccion;
        $Usuario->correo = $request->correo;
        $Usuario->verificado = 0;
        $Usuario->ultimo_acceso = date("Y-m-d H:i:s");
        $Usuario->fecha_nacimiento = $request->fechaNacimiento;
        $Usuario->token = $token;
        $Usuario->save();


        $html = "<p>Estimado(a) " . $request->nombres . " " . $request->apellidos . "</p>";
        $html .= "<p>Hacer click en la url para verificar su usuario:</p>";
        $html .= '<p><a href="' . url('/') . '/verificar-correo?token=' . $token . '">' . url('/') . '/verificar-correo?token=' . $token . '</a></p>';

        $cabeceras = 'MIME-Version: 1.0' . "\r\n";
        $cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";



        mail($request->correo, "Validación de Correo", $html, $cabeceras);

        return redirect(url('/') . '?mensaje=' . base64_encode("Usuario Ingresado con éxito. Se ha enviado un correo de verificación"));
    }

}
