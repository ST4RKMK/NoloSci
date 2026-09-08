


@extends('layouts.app')


@section('content')

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6" style="max-width:80%;background-color:#342f2f">
    <div class="card">
        <div class="card-body">
            <form method="post" action="{{route('catalog.store')}}">
                @csrf
                <div class="grid grid-cols-2 gap-2 py-2 px-4">

            @foreach($data as $k=>$v)
                    @include('appl.components.forms.input',['name'=>$k,'data'=>$v])

                @endforeach
                </div>
                <div class="">
                    <flux:button variant="primary" color="amber">Salva</flux:button>

{{--                    <button type="submit" class="btn btn-xs btn-info">Salva</button>--}}
                </div>
            </form>
        </div>
    </div>
    </div>

@endsection
