<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts=Post::with('category')->orderBy('id', 'desc')->paginate(10);
        return view('posts.inicio', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categorias=Category::select('id', 'nombre')->orderBy('nombre')->get();
        return view('posts.nuevo', compact('categorias'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'titulo'=>['required', 'string', 'min:3', 'unique:posts,titulo'],
            'contenido'=>['required', 'string', 'min:10'],
            'publicado'=>['required', 'in:SI,NO'],
            'category_id'=>['required', 'exists:categories,id']
        ]);
        Post::create($request->all());
        return redirect()->route('posts.index')->with('info', "Post Creado con éxito");
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('posts.detalle', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        $categorias=Category::select('id', 'nombre')->orderBy('nombre')->get();
        return view('posts.editar', compact('post', 'categorias'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'titulo'=>['required', 'string', 'min:3', 'unique:posts,titulo,'.$post->id],
            'contenido'=>['required', 'string', 'min:10'],
            'publicado'=>['required', 'in:SI,NO'],
            'category_id'=>['required', 'exists:categories,id']
        ]);
        $post->update($request->all());
        return redirect()->route('posts.index')->with('info', "Post actualizado con éxito");

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('posts.index')->with('info', "Post Borrado con éxito");

    }
}
