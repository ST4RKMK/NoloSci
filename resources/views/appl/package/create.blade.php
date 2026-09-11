@extends('layouts.app')
{{--@dd($data)--}}
@section('content')
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6" style="max-width:80%;background-color:#342f2f">
        @include('appl.components.create',['data'=>$data])
    </div>
@endsection
