{{--@dd(array_column($data,'to'),$data,array_merge($data,array_column($data,'to')))--}}

@extends('layouts.public')

@section('content')
    <div class="flex flex-wrap">
        @foreach($data as $k=>$v)
            {{--        @if(isset($data['to']))--}}
            {{--            @include('public.package-card',$v)--}}
            {{--        @endif--}}
            @include('public.package-card',$v)

        @endforeach
    </div>




{{--        @foreach(\Illuminate\Support\Arr::except($data,['to']) as $k=>$V)--}}

{{--        @endforeach--}}



@endsection
