<div class="variante" index = "{{$index}}">

    @foreach($fields as $kk => $vv)
        @include('appl.components.forms.input',['name'=> "extend_meta[{$index}][{$kk}]",'data'=>$vv])
    @endforeach

    <button type="button" class="remove-variante">Rimuovi</button>
</div>
