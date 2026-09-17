{{--@dump($e)--}}

<div class="max-w-sm rounded overflow-hidden shadow-lg p-2 m-2" style="min-width: 350px" role="button">

    <div class="px-2 py-2" >
        <input type="radio" name="package" id={{$e}}>
        <label class="font-bold text-xl mb-2" for={{$e['id']}}>{{$e['name']}}</label>

        <p class="text-gray-700 text-base border-b-2">
            {{$e['description']}}
        </p>
        <p class="text-gray-700 text-base">
            <span class="font-bold">Dal </span>{{$e['available_from']->format('d/m/Y')}}
        </p>
        <p class="text-gray-700 text-base">
            <span class="font-bold">Al </span>{{$e['available_to']->format('d/m/Y')}}
        </p>
    </div>
    <div class="flex-1 px-5 py-4">
        @if(!empty($e['from']))
            <p class="text-gray-700 text-base border-b-2">Include:</p>
            <ul>
                @foreach($e['from'] as $r)
                    @continue(empty($r['toable']))
                    @php($prd = $r['toable_type'] === \App\Models\Admin\Catalog::class)
                    <li class="flex items-center text-sm">
                        {{$prd ? 'Prodotto' : 'Pacchetto'}}
                        <span class="truncate text-gray-700">{{ $r['toable']['name'] }}</span>

                        @if($prd)
                            <span class="ml-auto shrink-0 tabular-nums text-gray-500">
                                {{ number_format($r['toable']['price'], 2, ',', '.') }} €
                            </span>
                        @endif
                    </li>
                @endforeach
            </ul>
        @endif
    </div>
    <div class="px-6 pt-4 pb-2">
        <flux:button variant="primary">Aggiungi</flux:button>
    </div>

</div>
