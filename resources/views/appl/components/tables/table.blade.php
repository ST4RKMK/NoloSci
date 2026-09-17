
@extends('layouts.app')

@section('content')
    <table class="table-auto w-full text-left text-zinc-800">
        @include('appl.components.tables.headers')
        @include('appl.components.tables.body')



        @include('appl.components.tables.footer')
    </table>

@endsection
