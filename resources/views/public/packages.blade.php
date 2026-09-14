{{--@dd(array_column($data,'to'),$data,array_merge($data,array_column($data,'to')))--}}
{{--@dd($data)--}}
@extends('layouts.public')

@section('content')
    <div class="flex flex-wrap">
        @foreach($data as $p)
            @include('public.package-card',$p)

        @endforeach
    </div>




{{--        @foreach(\Illuminate\Support\Arr::except($data,['to']) as $k=>$V)--}}

{{--        @endforeach--}}



@endsection
