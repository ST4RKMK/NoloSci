


@extends('layouts.public')

@section('content')


        @foreach($data as $datum)
            <div class="py-6 px-6" data-id="{{$datum->id}}" data-type="{{$datum->resolve()['type']}}">
            @include('public.cards.card',['data'=>$datum->resolve()])
            </div>
        @endforeach


@endsection
