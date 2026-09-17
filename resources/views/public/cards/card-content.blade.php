

@if(isset($data['children']) && !empty($data['children']))
@foreach($data['children'] as $k=>$child)
    @if($child)
    @php

    $child = $child->resolve();
    @endphp
    <div clas="item-{{$k}}">
        {{$child['title']}} - {{$child['price']}}
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
