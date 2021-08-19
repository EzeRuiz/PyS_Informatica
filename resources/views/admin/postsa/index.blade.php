@extends('adminlte::page')

@section('title', 'PyS')

@section('content_header')
   
    <h1>Listado de Todas las Publicaciones</h1>
@stop

@section('content')
    @if (session('info'))

        <div class="alert alert-success">
            <strong>{{session('info')}}</strong>
        </div>    
    @endif
  @livewire('admin.postsa-index')
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop