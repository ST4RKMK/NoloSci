@extends('layouts.app')
{{--@dd($data)--}}
@section('content')
    <div class="w-full mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
        <div class="mx-auto sm:px-6 lg:px-8 space-y-6" style="background-color:#342f2f">
            @include('appl.components.create',['data'=>$data])
        </div>
    </div>
@endsection
