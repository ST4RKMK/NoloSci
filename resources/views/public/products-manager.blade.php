@extends('layouts.public')

@section('content')
    <div class="flex-auto">

            <p class="text-gray-700 text-base border-b-2">Pacchetti</p>
            <div class="flex flex-wrap" >
                @foreach($data as $e)
                    {{--                    <input type="radio" name="package" id={{$e}}>--}}
                    <div class="card-body" role="button">
                        <div class="max-w-sm rounded overflow-hidden shadow-lg p-2 m-2" style="min-width: 350px" role="button">
                            <div class="px-2 py-2" >
                                <input type="radio" name="package" id={{$e->id}}>
                                <label class="font-bold text-xl mb-2" for={{$e->id}}>{{$e->name}}</label>

                                <p class="text-gray-700 text-base border-b-2">
                                    {{$e['description']}}
                                </p>
                                <div class="flex-1 px-5 py-4">
                        @include('public.products',['e'=>$e,'deep'=>1])


                                </div>
                                <p class="text-gray-700 text-base">
                                    <span class="font-bold">Dal </span>{{$e['available_from']->format('d/m/Y')}}
                                </p>
                                <p class="text-gray-700 text-base">
                                    <span class="font-bold">Al </span>{{$e['available_to']->format('d/m/Y')}}
                                </p>
                            </div>
                        </div>

                    </div>

                @endforeach
            </div>
    </div>

@endsection
