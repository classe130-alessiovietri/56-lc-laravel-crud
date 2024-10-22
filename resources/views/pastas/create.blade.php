@extends('layouts.app')

@section('page-title', 'Crea pasta')

@section('main-content')
<h1>
    Crea pasta
</h1>

<form action="{{ route('pastas.store') }}" method="POST">
    @csrf

    <div class="mb-3">
        <label for="src" class="form-label">Src</label>
        <input type="text" class="form-control" id="src" name="src" maxlength="1024" placeholder="Inserisci il valore di src...">
    </div>

    <div class="mb-3">
        <label for="title" class="form-label">Titolo <span class="text-danger">*</span></label>
        <input type="text" class="form-control" id="title" name="title" required maxlength="64" placeholder="Inserisci il valore di titolo...">
    </div>

    <div class="mb-3">
        <label for="type" class="form-label">Tipo <span class="text-danger">*</span></label>
        <select class="form-select" id="type" name="type" required>
            <option selected disabled>Seleziona un'opzione...</option>
            <option value="lunga">Lunga</option>
            <option value="corta">Corta</option>
            <option value="cortissima">Cortissima</option>
        </select>
    </div>

    <div class="mb-3">
        <label for="cooking_time" class="form-label">Tempo di cottura (min.)</label>
        <input type="number" class="form-control" id="cooking_time" name="cooking_time" min="0" placeholder="Inserisci il valore di tempo di cottura...">
    </div>

    <div class="mb-3">
        <label for="weight" class="form-label">Peso (g) <span class="text-danger">*</span></label>
        <input type="number" class="form-control" id="weight" name="weight" required min="0" max="5000" step="50" placeholder="Inserisci il valore di peso...">
    </div>

    <div class="mb-3">
        <label for="description" class="form-label">Descrizione <span class="text-danger">*</span></label>
        <textarea class="form-control" id="description" name="description" rows="3" required maxlength="4096" placeholder="Inserisci una descrizione..."></textarea>
    </div>

    <div>
        <button type="submit" class="btn btn-success w-100">
            + Aggiungi
        </button>
    </div>

</form>
@endsection
