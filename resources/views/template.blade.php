<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>LIGA BARRIAL</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="{{url('/')}}/css/bootstrap.css" rel="stylesheet" type="text/css">
        <link href="{{url('/')}}/css/font-awesome.css" rel="stylesheet" type="text/css">
        <link href="{{url('/')}}/css/style.css" rel="stylesheet" type="text/css">


    </head>
    <body>

        <section id="section-header">
            <div class="container">
                <div class="row">
                    <div class="col-12 form-group text-right">
                        <p>Bienvenido(a): {{$_SESSION['nombre']}}</p>
                        <a href="{{url('/')}}/cerrar-sesion">Cerrar Sesión</a>
                    </div>
                </div>
            </div>
        </section>

        <section>
            <div class="container">
                <div class="row">
                    <div class="col-12 form-group">
                        <div class="card border-primary">
                            <div class="card-header">{{$titulo}}</div>
                            <div class="card-body">
                                @section('contenido')
                                
                                @show
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </body>
</html>