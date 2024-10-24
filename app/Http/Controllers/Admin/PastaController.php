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
        $request->validate([
            'src' => 'nullable|max:1024|url',
            'title' => 'required|min:3|max:64',
            'type' => 'required|min:3|max:16',
            'cooking_time' => 'nullable|integer|min:1|max:20',
            'weight' => 'required|integer|min:50|max:5000',
            'description' => 'required|min:1|max:4096',
        ], [
            'src.url' => 'IL CAMPO SRC DEVE ESSERE UN LINK, OVVIAMENTE!!!',
            'title.required' => 'Ti pare mai possibile che la pasta non abbia un titolo?'
        ]);

        $data = $request->all();

        /*
            Controlli da fare:
            - tutti i campi not null devono essere passati (title, type, weight, description)
            - per i campi stringa, controllare se la lunghezza è entro i limiti (se sono obbligatori, altrimenti va bene anche null)
            - per i campi numerici, controllare se il valore è entro i limiti
        */
        // if (!isset($data['title'])) {
        //     /* Che faccio? Torno alla pagina precedente mostrando un errore SPECIFICO */
        //     return 'Il campo titolo è obbligatorio';
        // }

        $pasta = Pasta::create($data);

        /* OPPURE */

        // $pasta = new Pasta();
        // $pasta->fill($data);
        // $pasta->save();

        /* OPPURE */

        // $pasta = new Pasta();
        // $pasta->src = $data['src'];
        // $pasta->title = $data['title'];
        // $pasta->type = $data['type'];
        // $pasta->cooking_time = $data['cooking_time'];
        // $pasta->weight = $data['weight'];
        // $pasta->description = $data['description'];
        // $pasta->save();

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
    public function edit(Pasta $pasta)
    {
        return view('pastas.edit', compact('pasta'));
    }
    // public function edit(string $id)
    // {
    //     $pasta = Pasta::findOrFail($id);

    //     return view('pastas.edit', compact('pasta'));
    // }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pasta $pasta)
    {
        $request->validate([
            'src' => 'nullable|max:1024|url',
            'title' => 'required|min:3|max:64',
            'type' => 'required|min:3|max:16',
            'cooking_time' => 'nullable|integer|min:1|max:20',
            'weight' => 'required|integer|min:50|max:5000',
            'description' => 'required|min:1|max:4096',
        ], [
            'src.url' => 'IL CAMPO SRC DEVE ESSERE UN LINK, OVVIAMENTE!!!',
            'title.required' => 'Ti pare mai possibile che la pasta non abbia un titolo?'
        ]);

        $data = $request->all();

        $pasta->update($data);

        /* OPPURE */

        // $pasta->fill($data);
        // $pasta->save();

        /* OPPURE */

        // $pasta->src = $data['src'];
        // $pasta->title = $data['title'];
        // $pasta->type = $data['type'];
        // $pasta->cooking_time = $data['cooking_time'];
        // $pasta->weight = $data['weight'];
        // $pasta->description = $data['description'];
        // $pasta->save();

        return redirect()->route('pastas.show', ['pasta' => $pasta->id]);
    }
    // public function update(Request $request, string $id)
    // {
    //     $pasta = Pasta::findOrFail($id);

    //     $data = $request->all();

    //     $pasta->src = $data['src'];
    //     $pasta->title = $data['title'];
    //     $pasta->type = $data['type'];
    //     $pasta->cooking_time = $data['cooking_time'];
    //     $pasta->weight = $data['weight'];
    //     $pasta->description = $data['description'];
    //     $pasta->save();

    //     return redirect()->route('pastas.show', ['pasta' => $pasta->id]);
    // }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pasta $pasta)
    {
        $pasta->delete();

        return redirect()->route('pastas.index');
    }
    // public function destroy(string $id)
    // {
    //     $pasta = Pasta::findOrFail($id);

    //     $pasta->delete();

    //     return redirect()->route('pastas.index');
    // }
}
