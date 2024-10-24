@extends('layouts.app')

@section('page-title', 'Modifica '.$pasta->title)

@section('main-content')
<h1>
    Modifica {{ $pasta->title }}
</h1>

@if ($errors->any())
   <div class="alert alert-danger my-4">
       <ul class="mb-0">
           @foreach ($errors->all() as $error)
               <li>{{ $error }}</li>
           @endforeach
       </ul>
   </div>
@endif

<form action="{{ route('pastas.update', ['pasta' => $pasta->id]) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label for="src" class="form-label">Src</label>
        <input
            type="text"
            class="form-control @error('src') is-invalid @enderror"
            id="src"
            name="src"
            maxlength="1024"
            placeholder="Inserisci il valore di src..."
            value="{{ old('src', $pasta->src) }}">

        @if($errors->has('src'))
            <div class="alert alert-danger mt-1">
                ERRORI SRC:
                <ul class="mb-0">
                    @foreach($errors->get('src') as $key => $error)
                        <li>
                            {{ $error }}
                        </li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>

    <div class="mb-3">
        <label for="title" class="form-label">Titolo <span class="text-danger">*</span></label>
        <input
            type="text"
            class="form-control @error('title') is-invalid @enderror"
            id="title"
            name="title"
            required
            maxlength="64"
            placeholder="Inserisci il valore di titolo..."
            value="{{ old('title', $pasta->title) }}">

        @error('title')
            <div class="alert alert-danger mt-1">
                ERRORE TITOLO: {{ $message }}
            </div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="type" class="form-label">Tipo <span class="text-danger">*</span></label>
        <select class="form-select @error('type') is-invalid @enderror" id="type" name="type" required>
            <option
                @if (old('type', $pasta->type) === null || old('type', $pasta->type) == '')
                    selected
                @endif
                disabled>Seleziona un'opzione...</option>
            <option
                @if (old('type', $pasta->type) == 'lunga')
                    selected
                @endif
                value="lunga">Lunga</option>
            <option
                @if (old('type', $pasta->type) == 'corta')
                    selected
                @endif
                value="corta">Corta</option>
            <option
                @if (old('type', $pasta->type) == 'cortissima')
                    selected
                @endif
                value="cortissima">Cortissima</option>
        </select>

        @error('type')
            <div class="alert alert-danger mt-1">
                ERRORE TIPO: {{ $message }}
            </div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="cooking_time" class="form-label">Tempo di cottura (min.)</label>
        <input
            type="number"
            class="form-control @error('cooking_time') is-invalid @enderror"
            id="cooking_time"
            name="cooking_time"
            min="0"
            placeholder="Inserisci il valore di tempo di cottura..."
            value="{{ old('cooking_time', $pasta->cooking_time) }}">

        @error('cooking_time')
            <div class="alert alert-danger mt-1">
                ERRORE TEMPO DI COTTURA: {{ $message }}
            </div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="weight" class="form-label">Peso (g) <span class="text-danger">*</span></label>
        <input
            type="number"
            class="form-control @error('weight') is-invalid @enderror"
            id="weight"
            name="weight"
            required
            min="0"
            max="5000"
            step="50"
            placeholder="Inserisci il valore di peso..."
            value="{{ old('weight', $pasta->weight) }}">

        @error('weight')
            <div class="alert alert-danger mt-1">
                ERRORE PESO: {{ $message }}
            </div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="description" class="form-label">Descrizione <span class="text-danger">*</span></label>
        <textarea
            class="form-control @error('description') is-invalid @enderror"
            id="description"
            name="description"
            rows="3"
            required
            maxlength="4096"
            placeholder="Inserisci una descrizione...">{{ old('description', $pasta->description) }}</textarea>

        @error('description')
            <div class="alert alert-danger mt-1">
                ERRORE DESCRIZIONE: {{ $message }}
            </div>
        @enderror
    </div>

    <div class="text-center">
        <button type="submit" class="btn btn-warning w-100">
            Aggiorna
        </button>

        <a href="{{ route('pastas.show', ['pasta' => $pasta->id]) }}" class="btn btn-secondary mt-3">
            Annulla
        </a>
    </div>

</form>
@endsection
