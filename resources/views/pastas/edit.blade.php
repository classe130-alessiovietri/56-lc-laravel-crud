@extends('layouts.app')

@section('page-title', 'Modifica '.$pasta->title)

@section('main-content')
<h1>
    Modifica {{ $pasta->title }}
</h1>

<form action="{{ route('pastas.update', ['pasta' => $pasta->id]) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label for="src" class="form-label">Src</label>
        <input
            type="text"
            class="form-control"
            id="src"
            name="src"
            maxlength="1024"
            placeholder="Inserisci il valore di src..."
            value="{{ $pasta->src }}">
    </div>

    <div class="mb-3">
        <label for="title" class="form-label">Titolo <span class="text-danger">*</span></label>
        <input
            type="text"
            class="form-control"
            id="title"
            name="title"
            required
            maxlength="64"
            placeholder="Inserisci il valore di titolo..."
            value="{{ $pasta->title }}">
    </div>

    <div class="mb-3">
        <label for="type" class="form-label">Tipo <span class="text-danger">*</span></label>
        <select class="form-select" id="type" name="type" required>
            <option
                @if (!isset($pasta->type) || $pasta->type == '')
                    selected
                @endif
                disabled>Seleziona un'opzione...</option>
            <option
                @if ($pasta->type == 'lunga')
                    selected
                @endif
                value="lunga">Lunga</option>
            <option
                @if ($pasta->type == 'corta')
                    selected
                @endif
                value="corta">Corta</option>
            <option
                @if ($pasta->type == 'cortissima')
                    selected
                @endif
                value="cortissima">Cortissima</option>
        </select>
    </div>

    <div class="mb-3">
        <label for="cooking_time" class="form-label">Tempo di cottura (min.)</label>
        <input
            type="number"
            class="form-control"
            id="cooking_time"
            name="cooking_time"
            min="0"
            placeholder="Inserisci il valore di tempo di cottura..."
            value="{{ $pasta->cooking_time }}">
    </div>

    <div class="mb-3">
        <label for="weight" class="form-label">Peso (g) <span class="text-danger">*</span></label>
        <input
            type="number"
            class="form-control"
            id="weight"
            name="weight"
            required
            min="0"
            max="5000"
            step="50"
            placeholder="Inserisci il valore di peso..."
            value="{{ $pasta->weight }}">
    </div>

    <div class="mb-3">
        <label for="description" class="form-label">Descrizione <span class="text-danger">*</span></label>
        <textarea
            class="form-control"
            id="description"
            name="description"
            rows="3"
            required
            maxlength="4096"
            placeholder="Inserisci una descrizione...">{{ $pasta->description }}</textarea>
    </div>

    <div>
        <button type="submit" class="btn btn-warning w-100">
            Aggiorna
        </button>
    </div>

</form>
@endsection
