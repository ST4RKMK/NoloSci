@if($name==='extend_meta')
    <div id="varianti-container">

        @include('appl.components.forms.variante', ['fields' => $data, 'index' => 0])
    </div>

    <template id="variante-template">
        @include('appl.components.forms.variante', ['fields' => $data, 'index' => '__i__'])
    </template>

    <button type="button" id="add-variante">+ Aggiungi variante</button>
    {{--        @include('appl.components.forms.input',['name'=>$n,'data'=>$v])--}}

@else
    @if(in_array($data['type'],['text','number','date','datetime','datetime-local']))

        <flux:input name="{{$name}}"
                    :attributes="new \Illuminate\View\ComponentAttributeBag(\Illuminate\Support\Arr::except($data,['items','fn','rules']))"/>
    @else
        @include('appl.components.forms.'.$v['type'],['name'=>$name,'data'=>$data])

    @endif

@endif

