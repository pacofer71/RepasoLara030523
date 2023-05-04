@extends('layouts.uno')
@section('titulo')
    INICIO
@endsection
@section('cabecera')
    Listado de Posts
@endsection
@section('contenido')
    <div class="flex flex-col">
        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                <div class="overflow-hidden">
                <div class="flex flex-row-reverse mb-3">
                <a href="{{route('posts.create')}}" class="bg-green-500 hover:bg-green-700 text-white text-sm py-2 px-4 rounded">
                <i class='fas fa-add'> Nuevo</i>
                </a>
                </div>
                    <table class="min-w-full text-left text-sm font-light">
                        <thead class="border-b font-medium dark:border-neutral-500">
                            <tr>
                                <th scope="col" class="px-6 py-4">Detalle</th>
                                <th scope="col" class="px-6 py-4">Titulo</th>
                                <th scope="col" class="px-6 py-4">Publicado</th>
                                <th scope="col" class="px-6 py-4">Categoria</th>
                                <th scope="col" class="px-6 py-4">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($posts as $item)
                                <tr class="border-b dark:border-neutral-500 hover:bg-gray-300">
                                    <td class="whitespace-nowrap px-6 py-4 font-medium">
                                        <a href="{{route('posts.show', $item)}}"
                                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                            <i class="fas fa-info"></i>
                                        </a>
                                    </td>
                                    <td class="whitespace-nowrap px-6 py-4">{{$item->titulo}}</td>
                                    <td @class([
                                        "whitespace-nowrap px-6 py-4",
                                        'text-red-800 font-bold bg-gray-400'=>$item->publicado=='NO'
                                    ])>{{$item->publicado}}</td>
                                    <td class="whitespace-nowrap px-6 py-4">{{$item->category->nombre}}</td>
                                    <td class="whitespace-nowrap px-6 py-4">
                                    <form method="POST" action="{{route('posts.destroy', $item)}}">
                                        @csrf
                                        @method('delete')
                                        <a href="{{route('posts.edit', $item)}}" class="text-yellow-500">
                                        <i class="fas fa-edit"></i>
                                        </a>
                                        <button type="submit" class="ml-4 text-red-700">
                                        <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="mt-5">
                    {{$posts->links()}}
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
@if(session('info'))
<script>
Swal.fire({
  icon: 'success',
  title: '{{session('info')}}',
  showConfirmButton: false,
  timer: 1500
})
</script>
@endif
@endsection
