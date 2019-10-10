@php
    $pageHeader = "EDITAR USUARIO"
@endphp

@extends('adminlte::layouts.app')

@section("admin_content")

    @component('admin.ticket.partals.form')
        @slot('clients', $clients)
        @slot('technicals', $technicals)
        @slot('ticket', $ticket)
        @slot('method', 'PUT')
        @slot('url', route('tickets.update',$ticket->id))
        @slot('action', "EDITAR TICKET")
        @slot('this_update', "true")
    @endcomponent

@stop
