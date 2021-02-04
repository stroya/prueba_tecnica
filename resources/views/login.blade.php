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
        <script src="{{url('/')}}/js/jquery.min.js"></script>
        <script src="{{url('/')}}/js/bootstrap.min.js"></script>
        <script src="{{url('/')}}/js/funciones.js"></script>


    </head>
    <body>


        <section>
            <div class="container">
                <div class="row">
                    <div class="col-12 form-group">
                        <div class="card border-primary">
                            <div class="card-header">LOGIN</div>
                            <div class="card-body">
                                <?php if (isset($_GET['mensaje'])) { ?>
                                    <div class="alert alert-danger">{{base64_decode($_GET['mensaje'])}}</div> 
                                <?php } ?>

                                <form method="POST" action="{{url('/')}}/verificar-login">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <div class="row">
                                        <div class="col-md-12 form-group">
                                            <label>Correo</label>
                                            <input type="email" name="email" class="form-control form-control-sm">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 form-group">
                                            <label>Password</label>
                                            <input type="password" name="password" class="form-control form-control-sm">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 form-group">
                                            <button type="submit" class="btn btn-primary btn-sm">Ingresar</button>
                                        </div>
                                    </div>
                                </form>

                                <div class="row">
                                    <div class="col-md-6 form-group text-left">
                                        <a href="#" class="btn-olvido-password">Olvido Password</a>
                                    </div>
                                    <div class="col-md-6 form-group text-right">
                                        <a href="#" class="btn-registrar">Registrar Usuario</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <div class="modal fade" id='modal-olvido-password'>
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Recuperación de Password</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="{{url('/')}}/recuperar-password">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class='form-group'>
                                <label>Correo:</label>
                                <input type="email" name="correo" class="form-control form-control-sm">                                
                            </div>
                            <div class='form-group'>
                                <label>Nuevo Password:</label>
                                <input type="password" name="password" class="form-control form-control-sm">                                
                            </div>
                            <div class='form-group'>
                                <button type="submit" class="btn btn-primary btn-sm">Enviar</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>


        <div class="modal fade" id='modal-registrar-usuario'>
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Registrar Usuario</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="{{url('/')}}/registrar-usuario">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class='form-group'>
                                <label>Nombres:</label>
                                <input type="text" name="nombres" class="form-control form-control-sm">                                
                            </div>
                            <div class='form-group'>
                                <label>Apellidos:</label>
                                <input type="text" name="apellidos" class="form-control form-control-sm">                                
                            </div>
                            <div class='form-group'>
                                <label>Dirección:</label>
                                <input type="text" name="direccion" class="form-control form-control-sm">                                
                            </div>
                            <div class='form-group'>
                                <label>Fecha nacimiento:</label>
                                <input type="date" name="fechaNacimiento" class="form-control form-control-sm" value="{{date("Y-m-d")}}">                                
                            </div>
                            <div class='form-group'>
                                <label>Correo:</label>
                                <input type="email" name="correo" class="form-control form-control-sm">                                
                            </div>
                            <div class='form-group'>
                                <label>Password:</label>
                                <input type="password" name="password" class="form-control form-control-sm">                                
                            </div>
                            <div class='form-group'>
                                <button type="submit" class="btn btn-primary btn-sm">Registrar</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>

    </body>
</html>