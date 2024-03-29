@extends('adminlte::page')

@section('title', 'PyS')

@section('content_header')
    <a class="btn btn-secondary btn-sm float-right" href="{{route('admin.posts.create')}}">Nueva Publicación</a>
    <h1>Listado de Publicaciones</h1>
@stop

@section('content')
    @if (session('info'))

        <div class="alert alert-success">
            <strong>{{session('info')}}</strong>
        </div>    
    @endif
  @livewire('admin.posts-index')
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop