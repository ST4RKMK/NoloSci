{{--@if($name==='extend_meta')--}}
{{--    <div id="varianti-container">--}}

{{--        @include('appl.components.forms.variante', ['fields' => $data, 'index' => 0])--}}
{{--    </div>--}}

{{--    <template id="variante-template">--}}
{{--        @include('appl.components.forms.variante', ['fields' => $data, 'index' => '__i__'])--}}
{{--    </template>--}}

{{--    <button type="button" id="add-variante">+ Aggiungi variante</button>--}}
{{--    --}}{{--        @include('appl.components.forms.input',['name'=>$n,'data'=>$v])--}}

{{--@else--}}
    @if(isset($data['type']))

        @if(in_array($data['type'],['text','number','date','datetime','datetime-local']))
            <flux:input name="{{$name}}"
                        :attributes="new \Illuminate\View\ComponentAttributeBag(\Illuminate\Support\Arr::except($data,['items','fn','rules']))"/>
        @else
            @include('appl.components.forms.'.$v['type'],['data'=>$v])
        @endif

    @else
        @foreach($data as $kk=>$vv)
            @include('appl.components.forms.'.$vv['type'],['name'=>$kk,'data'=>$vv])
        @endforeach
{{--        @dd($name,$data)--}}
{{--        @include('appl.components.forms.'.$name,['data'=>$data])--}}

    @endif

{{--@endif--}}

