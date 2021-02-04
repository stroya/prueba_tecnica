@extends('template')


@section('contenido')

<legend>Lista de Usuarios</legend>

<?php if (isset($_GET['mensaje'])) { ?>
    <div class='alert alert-success'>{{base64_decode($_GET['mensaje'])}}</div>
<?php } ?>

<table class="table table-striped">
    <thead>
        <tr>
            <th></th>
            <th>Nombres</th>
            <th>Apellidos</th>
            <th>Dirección</th>
            <th>Correo</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($lista as $list) { ?>
            <tr>
                <td><a href="{{url('/')}}/usuarios/editar/{{$list->id}}"><i class="fa fa-pencil"></i></a></td>
                <td>{{$list->nombres}}</td>
                <td>{{$list->apellidos}}</td>
                <td>{{$list->direccion}}</td>
                <td>{{$list->correo}}</td>
            </tr>
        <?php } ?>
    </tbody>
</table>


@stop