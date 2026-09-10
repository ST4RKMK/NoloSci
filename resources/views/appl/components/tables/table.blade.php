
@extends('layouts.app')

@section('content')


    <table class="table">
        @include('appl.components.tables.headers')
        @include('appl.components.tables.body')



        @include('appl.components.tables.footer')
    </table>

@endsection
