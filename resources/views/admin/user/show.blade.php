@php
    $pageHeader = "DETALLES DE USUARIO"
@endphp

@extends('adminlte::layouts.app')

@section("admin_content")

    <div class="container box box-default">
        <div class="background">
            <h1 class="title">Detalle del usuario #{{$user->id}}</h1>
        </div>
        <p><b>Nombre del usuario:</b> {{$user->name}}</p>
        <p><b>Ocupacion del usuario:</b> {{$user->occupation}}</p>
        <p><b>e-mail del Usuario</b> {{$user->email}}</p>
        <p><b>Telefono del Usuario:</b> {{$user->phone}}</p>
        <p><b>rol del Usuario:</b> <small @role_color($user->role_id)>{{$user->role->name}}</small></p>

        <p class="return_index">
            <a class="btn btn-info" href="{{url('/admin/users')}}">Regresar al listado</a>
        </p>
    </div>

@stop
