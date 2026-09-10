@extends('layouts.app')
@section('content')
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6" style="max-width:80%;background-color:#342f2f">
        @include('appl.components.create',['name'=>$k,'data'=>$v, 'method' => 'POST','buttonLabel' => 'Salva Prenotazione','action'=>"'route('catalog.store')'"])
    </div>

@endsection
