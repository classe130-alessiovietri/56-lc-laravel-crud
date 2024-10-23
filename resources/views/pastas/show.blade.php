@extends('layouts.app')

@section('page-title', $pasta->title)

@section('main-content')
<div class="d-flex justify-content-between align-items-end mb-4">
    <h1>
        {{ $pasta->title }}
    </h1>

    <a href="{{ route('pastas.edit', ['pasta' => $pasta->id]) }}" class="btn btn-warning">
        Modifica
    </a>
</div>

<div class="card">
    <div class="card-body">
        <ul>
            <li>
                Tipo: {{ $pasta->type }}
            </li>
            <li>
                Tempo di cottura: {{ $pasta->cooking_time }} min.
            </li>
            <li>
                Peso: {{ $pasta->weight }}g
            </li>
        </ul>

        <p>
            {!! $pasta->description !!}
            <hr>
            {{ $pasta->description }}
        </p>
    </div>
    @if ($pasta->src != null)
        <img src="{{ $pasta->src }}" class="card-img-bottom" alt="{{ $pasta->title }}">
    @endif
</div>
@endsection
