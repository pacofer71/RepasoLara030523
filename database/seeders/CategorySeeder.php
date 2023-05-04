<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categorias=[
            'Categoria 1'=>'Descripcion de la categoria 1',
            'Categoria 2'=>'Descripcion de la categoria 2',
            'Categoria 3'=>'Descripcion de la categoria 3',
            'Categoria 4'=>'Descripcion de la categoria 4',
            'Categoria 5'=>'Descripcion de la categoria 5',
        ];
        foreach($categorias as $n=>$v){
            Category::create([
                'nombre'=>$n,
                'descripcion'=>$v
            ]);
        }
    }
}
