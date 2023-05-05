@extends('layouts.uno')
@section('titulo')
    nuevo
@endsection
@section('cabecera')
    Crear Post
@endsection
@section('contenido')
    <div class="p-8 rounded-xl shadow-xl w-3/5 mx-auto bg-gray-300">
        <form name="as" method="POST" action="{{ route('posts.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="titulo">
                    Título
                </label>
                <input value="{{ @old('titulo') }}"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    id="titulo" type="text" placeholder="Título del post..." name="titulo" />
                @error('titulo')
                    <p class="text-red-700 text-xs italic mt-2">***{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="contenido">
                    Contenido
                </label>
                <textarea rows='4'
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    id="contenido" placeholder="Contenido del post..." name="contenido">{{ @old('contenido') }}</textarea>
                @error('contenido')
                    <p class="text-red-700 text-xs italic mt-2">***{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="categoria">
                    Categoria
                </label>
                <select
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    id="categoria" name="category_id">
                    <option>_____ Selecciona una categoría _____</option>
                    @foreach ($categorias as $item)
                        <option value="{{ $item->id }}" @selected($item->id == @old('category_id'))>{{ $item->nombre }}</option>
                    @endforeach
                </select>
                @error('category_id')
                    <p class="text-red-700 text-xs italic mt-2">***{{ $message }}</p>
                @enderror

            </div>
            <label class="block text-gray-700 text-sm font-bold mb-2" for="categoria">
                Post Publicado?
            </label>
            <div class="flex mb-4">
                <div class="flex items-center mr-4">
                    <input id="si" type="radio" value="SI" name="publicado" @checked(@old('publicado') == 'SI')
                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <label for="si" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-900">SI</label>
                </div>
                <div class="flex items-center mr-4">
                    <input id="no" type="radio" value="NO" name="publicado" @checked(@old('publicado') == 'NO')
                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <label for="no" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-900">NO
                    </label>
                </div>

            </div>
            @error('publicado')
                <p class="text-red-700 text-xs italic mt-2">***{{ $message }}</p>
            @enderror
            <label class="block text-gray-700 text-sm font-bold mb-2" for="url">
                Imagen del Post
            </label>
            <div class="flex items-center content-center mb-4">
                <div class="flex-1 mr-4">
                    <input type="file" name="url" accept="image/*" id="url" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" />
                </div>

                <div>
                    <img src="{{ Storage::url('noimage.png') }}" class="object-center object-cover w-64" id="imagen" />
                </div>
            </div>
            @error('url')
                <p class="text-red-700 text-xs italic mt-2">***{{ $message }}</p>
            @enderror
            <div class="flex flex-row-reverse mb-3">
                <button type="submit" class="ml-4 bg-blue-500 hover:bg-blue-700 text-white text-sm py-2 px-4 rounded">
                    <i class='fas fa-save'> Guardar</i>
                </button>
                <a href="{{ route('posts.index') }}"
                    class="bg-red-500 hover:bg-red-700 text-white text-sm py-2 px-4 rounded">
                    <i class='fas fa-xmark'> Cancelar</i>
                </a>
            </div>
        </form>
    </div>
@endsection
@section('js')
    <script>
        function init() {
            var inputFile = document.getElementById('url');
            inputFile.addEventListener('change', mostrarImagen, false);
        }

        function mostrarImagen(event) {
            var file = event.target.files[0];
            var reader = new FileReader();
            reader.onload = function(event) {
                var img = document.getElementById('imagen');
                img.src = event.target.result;
            }
            reader.readAsDataURL(file);
        }

        window.addEventListener('load', init, false);
    </script>
@endsection
