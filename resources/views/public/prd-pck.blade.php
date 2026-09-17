


@extends('layouts.public')

@section('content')
    <div class="flex-auto">


        @foreach($data as $datum)
            @include('public.cards.card',['data'=>$datum->resolve()])
        @endforeach


    </div>
@endsection
