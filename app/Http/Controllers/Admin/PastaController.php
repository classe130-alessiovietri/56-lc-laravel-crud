<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Models
use App\Models\Pasta;

class PastaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $pastas = Pasta::all();
        $pastas = Pasta::get();

        return view('pastas.index', compact('pastas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pastas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $pasta = new Pasta();
        $pasta->src = $data['src'];
        $pasta->title = $data['title'];
        $pasta->type = $data['type'];
        $pasta->cooking_time = $data['cooking_time'];
        $pasta->weight = $data['weight'];
        $pasta->description = $data['description'];
        $pasta->save();

        return redirect()->route('pastas.show', ['pasta' => $pasta->id]);
        // return redirect()->route('pastas.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pasta $pasta)
    {
        return view('pastas.show', compact('pasta'));
    }
    /*
        VERSIONE "CANONICA" CON $id STRINGA
    */
    // public function show(string $id)
    // {
    //     // $pasta = Pasta::where('id', $id)->firstOrFail();
    //     $pasta = Pasta::findOrFail($id);

    //     return view('pastas.show', compact('pasta'));
    // }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
