@extends('layouts.app')

@section('page-title', 'Tutte le paste')

@section('main-content')
<h1>
    Tutte le paste
</h1>

<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Titolo</th>
            <th scope="col">Tipo</th>
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($pastas as $pasta)
            <tr>
                <th scope="row">{{ $pasta->id }}</th>
                <td>{{ $pasta->title }}</td>
                <td>{{ $pasta->type }}</td>
                <td>AZIONI</td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
