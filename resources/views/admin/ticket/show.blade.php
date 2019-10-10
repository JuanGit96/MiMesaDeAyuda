@php
    $pageHeader = "DETALLES DE USUARIO"
@endphp

@extends('adminlte::layouts.app')

@section("admin_content")

    <div class="container box box-default">
        <div class="background">
            <h1 class="title">Detalle del ticket #{{$ticket->id}}</h1>
        </div>
        <p><b>Tipo de caso:</b> {{$ticket->typeCase}}</p>
        <p><b>Prioridad:</b> {{$ticket->priority}}</p>
        <p><b>Direccion de caso/Cliente</b> {{$ticket->address}}</p>
        <p><b>Descripcion del caso:</b> {{$ticket->description}}</p>
        <p><b>Estatus:</b> <small @role_color($ticket->status)>@status($ticket->status)</small></p>
        <p><b>Tecnico responsable:</b> {{$ticket->technical->name}}</p>
        <p><b>Cliente:</b> {{$ticket->client->name}}</p>

        <p class="return_index">
            <a class="btn btn-info" href="{{url('/admin/tickets')}}">Regresar al listado</a>
        </p>
    </div>

@stop
