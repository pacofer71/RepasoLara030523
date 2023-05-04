@extends('layouts.uno')
@section('titulo')
    INICIO
@endsection
@section('cabecera')
    Listado de Posts
@endsection
@section('contenido')
  <a href="{{route('posts.index')}}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
  Gestionar Posts</a>  
@endsection