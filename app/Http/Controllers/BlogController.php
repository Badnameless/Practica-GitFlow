<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    public function BlogIndex(){
        $blogs = Blog::all();
        return view('blogs.index', compact('blogs'));
    }

    public function CreateView(){
        return view('blogs.create');
    }

    public function EditView($id){
        $blog = Blog::find($id);
        return view('blogs.edit', compact('blog'));
    }

    public function store(Request $request){
        $request->validate([
            'nombre' => 'required|string',
            'descripcion' => 'required|string',
            'sintomas' => 'required|string',
            'causas' => 'required|string',
            'prevencion' => 'required|string',
            'vistas' => 'required|integer',
            'imagen' => 'required|image',
            'fecha' => 'required|date'
        ]);

        $imagen = $request->file('imagen');

        $rutaImagen = $imagen->store('imagenes', 'public');

        Blog::create([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'sintomas' => $request->sintomas,
            'causas' => $request->causas,
            'prevencion' => $request->prevencion,
            'views' => $request->vistas,
            'imagen' => $rutaImagen,
            'fecha' => $request->fecha,
        ]);

        return redirect()->route('adm_blog');
    }

    public function delete($id){
        $blog = Blog::findOrFail($id);
        Storage::delete($blog->imagen);
        $blog->delete();
        return back();
    }

    public function edit(Request $request, $id) {
        $request->validate([
            'nombre' => 'required|string',
            'descripcion' => 'required|string',
            'sintomas' => 'required|string',
            'causas' => 'required|string',
            'prevencion' => 'required|string',
            'vistas' => 'required|integer',
            'fecha' => 'required|date'
        ]);
    
        $blog = Blog::findOrFail($id);
    
        if ($request->hasFile('imagen')) {
            $imagen = $request->file('imagen');
            $rutaImagen = $imagen->store('imagenes', 'public');
            $blog->imagen = $rutaImagen;
        }
    
        $blog->nombre = $request->nombre;
        $blog->descripcion = $request->descripcion;
        $blog->sintomas = $request->sintomas;
        $blog->causas = $request->causas;
        $blog->prevencion = $request->prevencion;
        $blog->views = $request->vistas;
        $blog->fecha = $request->fecha;
        $blog->save();
    
        return redirect()->route('adm_blog');
    }
    
}
