<div class="variante" index = "{{$index}}">
    @foreach($fields as $k => $v)
        @include('appl.components.forms.input',['name'=> "extend_meta[{$index}][{$k}]",'data'=>$v])
    @endforeach

    <button type="button" class="remove-variante">Rimuovi</button>
</div>
