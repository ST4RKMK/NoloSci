
@extends('layouts.app')

@section('content')
    <style>
        .city {
            background-color: tomato;
            color: white;
            border: 2px solid black;
            margin: 20px;
            padding: 20px;
        }
    </style>
    <table class="table">
        @include('appl.components.tables.headers')
        @include('appl.components.tables.body')



        @include('appl.components.tables.footer')
    </table>

@endsection
