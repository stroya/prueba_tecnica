@extends('template')


@section('contenido')



<form method="POST" action="{{url('/')}}/usuarios/actualizar">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="hidden" name="idUsuario" value="{{$usuario->id}}">
    <div class='row'>
        <div class="col-md-2 form-group">
            <label>Nombres:</label>
            <input type="text" name="nombres" value="{{$usuario->nombres}}" required="required" class="form-control form-control-sm">
        </div>
        <div class="col-md-2 form-group">
            <label>Apellido:</label>
            <input type="text" name="apellidos" value="{{$usuario->apellidos}}" required="required" class="form-control form-control-sm">
        
        </div>
        <div class="col-md-2 form-group">
            <label>Password:</label>
            <input type="password" name="password" value="**--**" required="required" class="form-control form-control-sm">
        
        </div>
        <div class="col-md-2 form-group">
            <label>Dirección:</label>
            <input type="text" name="direccion" value="{{$usuario->direccion}}" required="required" class="form-control form-control-sm">
        </div>
        
        <div class="col-md-2 form-group">
            <label>Fecha Nacimiento:</label>
            <input type="date" name="fechaNacimiento" value="{{$usuario->fecha_nacimiento}}" required="required" class="form-control form-control-sm">
        </div>

        <div class="col-md-2 form-group">
            <label>Correo:</label>
            <input type="email" name="correo" value="{{$usuario->correo}}" required="required"  class="form-control form-control-sm">
        </div>
    </div>
    <div class='row'>
        <div class="col-md-12 form-group">
            <button type="submit" class="btn btn-primary btn-sm">Actualizar</button>
            <a href="{{url('/')}}/usuarios" class="btn btn-danger btn-sm">Cancelar</a>
        </div>
    </div>
</form>


@stop