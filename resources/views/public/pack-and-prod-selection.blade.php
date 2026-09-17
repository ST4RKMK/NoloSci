@extends('layouts.public')

@section('content')
    <div class="flex-auto">
        <form>
            <p class="text-gray-700 text-base border-b-2">Pacchetti</p>
            <div class="flex flex-wrap" >
                @foreach($packages as $e)
{{--                    <input type="radio" name="package" id={{$e}}>--}}
                    <div class="card-body" role="button">
                        @include('public.cards.package-card',$e)
                    </div>

                @endforeach
            </div>
            <p class="text-gray-700 text-base  border-b-2">Prodotti</p>
            <div class="flex flex-wrap ">
                @foreach($products as $e)
                    @include('public.cards.product-card',$e)
                @endforeach
            </div>
        </form>

    </div>

@endsection
