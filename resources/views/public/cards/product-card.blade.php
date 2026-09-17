
<div class="max-w-sm rounded overflow-hidden shadow-lg p-2 m-2" style="min-width: 350px">
    <div class="px-2 py-2">
        <input type="radio" name="product" id={{$e}}>
        <div class="font-bold text-xl mb-2">{{$e['name']}} : {{$e['type']}}</div>
        <p class="text-gray-700 text-base">
            <span class="font-bold">Dal </span>{{$e['available_from']->format('d/m/Y')}}
        </p>
        <p class="text-gray-700 text-base">
            <span class="font-bold">Al </span>{{$e['available_to']->format('d/m/Y')}}
        </p>
        <span class="ml-auto shrink-0 tabular-nums text-gray-500">
            {{ number_format($e['price'], 2, ',', '.') }} €
        </span>
    </div>
    <div class="flex-auto px-5 py-4">
        @php($variants = $e->extend?->meta ?? [])
        @if(!empty($variants))
            <p class="text-gray-700 text-base border-b-2">Varianti disponibili:</p>
            <ol>
                @foreach($variants as $v)
                    <div>
                        <li>
                            @include('public.variante',$v)
                        </li>
                    </div>
                @endforeach
            </ol>
        @endif
    </div>
    <flux:button variant="primary">Aggiungi</flux:button>
</div>
