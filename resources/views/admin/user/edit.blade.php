@php
    $pageHeader = "EDITAR USUARIO"
@endphp

@extends('adminlte::layouts.app')

@section("admin_content")


    @component('admin.user.partals.form')
        @slot('roles', $roles)
        @slot('userE', $user)
        @slot('method', 'PUT')
        @slot('url', route('users.update',$user->id))
        @slot('action', "EDITAR USUARIO")
        @slot('this_update', "true")
    @endcomponent


@stop
