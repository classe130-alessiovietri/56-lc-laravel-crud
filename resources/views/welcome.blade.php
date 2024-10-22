@extends('layouts.app')

@section('page-title', 'Home')

@section('main-content')
<h1>
    Laravel Start 1
</h1>

<a href="{{ route('about') }}">
    Chi siamo
</a>
@endsection
