

@if(!empty($e->from))
{{--    <p class="text-gray-700 text-base border-b-2">Include:</p>--}}
    <ul style="padding-left: {{$deep*5}}px;">
        @foreach($e['from'] as $r)


            {{--                        @dd($r['toable'],$r,$e)--}}
            {{--                        @continue(empty($r['toable']))--}}
            {{--                        @php($prd = $r['toable_type'] === \App\Models\Admin\Catalog::class)--}}
            {{--                    @dd(\App\Models\Admin\Catalog::class,$e)--}}
            <li class="fleex rifletx items-center text-sm">
                @checkInstance($r->toable_type)
                <span class="truncate text-gray-700">{{ $r?->toable?->name}}</span>


                @if( $r->toable_type === \App\Models\Admin\Catalog::class)
                    <span class="ml-auto shrink-0 tabular-nums text-gray-500">
                                {{ number_format($r['toable']['price'], 2, ',', '.') }} €
                            </span>
                @else
                    @include('public.products',['e'=>$r->to,'deep'=>$deep+1])
                @endif
            </li>
        @endforeach
    </ul>
@endif
