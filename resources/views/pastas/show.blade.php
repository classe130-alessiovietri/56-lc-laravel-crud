@extends('layouts.app')

@section('page-title', $pasta->title)

@section('main-content')
<h1>
    {{ $pasta->title }}
</h1>

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
    <img src="{{ $pasta->src }}" class="card-img-bottom" alt="{{ $pasta->title }}">
</div>
@endsection
