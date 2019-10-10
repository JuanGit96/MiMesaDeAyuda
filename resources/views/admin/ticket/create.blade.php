@php
$pageHeader = "CREAR USUARIO"
@endphp

@extends('adminlte::layouts.app')

@section("admin_content")


@component('admin.ticket.partals.form')
    @slot('clients', $clients)
    @slot('technicals', $technicals)
    @slot('url', route('tickets.store'))
    @slot('action', "CREAR TICKET")
@endcomponent


@stop
