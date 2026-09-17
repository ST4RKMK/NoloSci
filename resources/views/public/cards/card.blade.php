
{{--<flux:card class="space-y-6">--}}
{{--    <div class="flex">--}}
{{--        <div class="flex-1">--}}
{{--            <flux:heading size="lg" class="text-black">{{$data['title']}} ({{$data['type']}}) {{$data['price']}}</flux:heading>--}}
{{--            @if($data['type']==='package')--}}
{{--               <sup> Disponibile dal {{$data['from']}} al {{$data['to']}} SCONTO {{$data['discount']}}</sup>--}}
{{--            @endif--}}
{{--            <flux:text class="mt-2">--}}
{{--                @include('public.cards.card-content',['data'=>$data])--}}
{{--            </flux:text>--}}
{{--        </div>--}}
{{--        <div class="-mx-2 -mt-2">--}}
{{--            <flux:button variant="ghost" size="sm" icon="x-mark" inset="top right bottom" />--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    <div class="flex gap-4">--}}
{{--        <flux:spacer />--}}
{{--        @include('public.cards.card-action',['data'=>$data])--}}
{{--    </div>--}}
{{--</flux:card>--}}


<div class="card bg-base-100 shadow-sm">
    <div class="card-body">
        <span class="card-title">{{$data['title']}}</span>
        <div class="flex justify-end">
            <span class="text-xl" >Prezzo {{ number_format($data['price'], 2, ',', '.') }} €</span>
        </div>
        @if($data['type']==='package')
            <div class="flex justify-between">
                <h4> Disponibile dal {{$data['from']}} al {{$data['to']}}</h4>

            </div>
        @endif

        @include('public.cards.card-content',['data'=>$data])

        <div class="mt-6">
            <div class="card-actions justify-end">
                <button class="btn btn-primary btn-block" x-data @click="$dispatch('addToCart',{data:{{json_encode(Arr::only($data,['title','price']),128)}}})">Seleziona</button>
            </div>
        </div>
    </div>
</div>
