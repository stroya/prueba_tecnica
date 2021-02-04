<?php

use Illuminate\Database\Seeder;
use App\Http\Models\UsuarioModel;

class DatabaseSeeder extends Seeder {

    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run() {
        // $this->call(UsersTableSeeder::class);

        $Usuario = new UsuarioModel();
        $Usuario->nombres = "Sebastian";
        $Usuario->apellidos = "Troya";
        $Usuario->direccion = "San Carlos";
        $Usuario->fecha_nacimiento = "1982-06-13";
        $Usuario->correo = "sebastian_troya@hotmail.com";
        $Usuario->password = md5("123456");
        $Usuario->token = md5("sebastian_troya@hotmail.com.1982-06-13");
        $Usuario->verificado = 1;
        $Usuario->ultimo_acceso = date("Y-m-d H:i:s");
        $Usuario->save();
    }

}
