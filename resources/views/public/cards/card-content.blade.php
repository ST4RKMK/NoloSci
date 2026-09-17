
{{--<div class="card-body">--}}
    @if(isset($data['children']) && !empty($data['children']))
        <div class="divider divider-info">Content </div>

        @foreach($data['children'] as $k=>$child)
            @if($child)

                <div clas="item-{{$k}}">

                    <div class="class-title">{{$child['title']}} - Prezzo {{ number_format($child['price'], 2, ',', '.') }} €</div>

                    @if(!empty($child['children']))
                        @include('public.cards.card-content',['data'=>$data['children']])
                    @endif

                </div>
            @endif
        @endforeach
    @endif
    @if(isset($data['variants']) && !empty($data['variants']))

        <select name="variants">
            @foreach($data['variants'] as $k=>$vars)
                <option value="{{$k}}">Tg:{{$vars['taglia']}}/colore:{{$vars['colore']}}</option>
            @endforeach
        </select>
    @endif
{{--</div>--}}

