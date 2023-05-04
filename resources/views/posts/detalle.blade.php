@extends('layouts.uno')
@section('titulo')
    Detalle
@endsection
@section('cabecera')
    Detalle Post
@endsection
@section('contenido')
 <div class="max-w-sm rounded overflow-hidden shadow-lg mx-auto bg-blue-400">
  <div class="px-6 py-4">
    <div class="font-bold text-xl mb-2">{{$post->titulo}}</div>
    <p class="text-gray-700 text-base">
    {{$post->contenido}}
    </p>
  </div>
  <div class="px-6 pt-4 pb-2">
    <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">
    #{{$post->category->nombre}}
    </span>
    
  </div>
</div>
@endsection