@php
    $pageHeader = "PANEL DE CONTROL - TICKETES";
    $pathRoute = "tickets.";
@endphp

@extends('adminlte::layouts.app')

@section("admin_content")
@isNotTechnical
    <p>
        <a href="{{ route($pathRoute.'create') }}" class="btn btn-primary">Nuevo Ticket
            <i class="fa fa-plus-circle"></i>
        </a>
    </p>
@endisNotTechnical
    <div class="box box-default table-responsive">

        @if(session()->has('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        @endif

        <table class="table">
            <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Tipo de caso</th>
                <th scope="col">Prioridad</th>
                <th scope="col">Direccion de caso/Cliente</th>
                <th scope="col">Descripcion del caso</th>
                <th scope="col">Estatus</th>
                <th scope="col">Tecnico responsable</th>
                <th scope="col">Cliente</th>
                <th scope="col">Acciones</th>
            </tr>
            </thead>
            <!--Mostrando usuarios-->
            @forelse($tickets as $ticket)
                <tr>
                    <th scope="row"> {{$ticket->id}}</th>
                    <td>{{$ticket->typeCase}}</th>
                    <td> <small @role_color($ticket->priority)>{{$ticket->priority}}</small></td>
                    <td> {{$ticket->address}}</td>
                    <td> {{$ticket->description}}</td>
                    <td> @status($ticket->status)</td>
                    <td>{{$ticket->technical->name}}</td>
                    <td>{{$ticket->client->name}}</td>
                    <td class="action">
                        <form method="POST" action="{{route($pathRoute.'destroy',$ticket->id)}}">
                        {{ csrf_field() }}<!--Protección de ataques laravel(token)-->
                            {{ method_field('DELETE') }}
                            <a class="btn btn-link" href="{{route($pathRoute.'index')}}/{{$ticket->id}}"><span class="fa fa-eye"></span></a>
                            @isNotTechnical
                            <a class="btn btn-link" href="{{route($pathRoute.'edit', $ticket->id)}}"><span class="fa fa-pencil"></span></a>
                            <button class="btn btn-link" type="submit" name="delete"><span class="fa fa-trash"></span></button>
                            @endisNotTechnical
                        </form>
                    </td>
                </tr>
            @empty
                <h3 class="alert alert-danger text-center">Noy Hay registros Aún</h3>
            @endforelse
        </table>
        {{--Paginación--}}
        <div class="center-block">
            {{$tickets->links()}}
        </div>
    </div>


@stop
