<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Noticia;
class NoticiaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $noticias = Noticia::all();
        return view("dashboard", compact("noticias"));
    }

    public function home() {
        $noticia = Noticia::all();
        return view("home", compact("noticias"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('noticias.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string|max.255',
            'descricao' => 'required|string'    ,
            'arquivo'=> 'required|file|image|mimes:png,jpg,jpeg.gif|max:2048'
        ]);

        $noticia = Noticia::create([
            'titulo'=> $request->titulo,
            'descricao'=> $request->descricao,
        ]);

        $noticia->storeFile($request->file('file'));

        return redirect()->route('dashboard')->with('status','noticia-created');
    }

    /**
     * Display the specified resource.
     */
    public function show(Noticia $noticia)
    {
        return view('dashboard', compact('noticia'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Noticia $noticia)
    {
        return view('noticias.edit', compact('noticia'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Noticia $noticia)
    {
        $request->validate([
            'titulo' => 'required|string|max.255',
            'descricao' => 'required|string'    ,
            'arquivo'=> 'required|file|image|mimes:png,jpg,jpeg.gif|max:2048'
        ]);

        $noticia->titulo = $request->titulo;
        $noticia->descricao = $request->descricao;

        if ($request->hasFile('file')) {
            $noticia->storeFile($request->file('file'));
        }

        $noticia->save();

        return redirect()->route('dashboard')->with('status', 'noticia-updated');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Noticia $noticia)
    {
        $noticia->delete();

        return redirect()->route('dashboard')->with('status','noticia-deleted');
    }
}
