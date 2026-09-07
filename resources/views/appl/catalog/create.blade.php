


@extends('layouts.app')


@section('content')

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6" style="max-width:80%;background-color:#ccc">
    <div class="card">
        <div class="card-body">
            <form method="post" action="{{route('catalog.store')}}">
                @csrf

            @foreach($data as $k=>$v)
                    @include('appl.components.forms.input',['name'=>$k,'data'=>$v])

                @endforeach
                <button type="submit">Salva</button>
            </form>
        </div>
    </div>
    </div>

@endsection

<script>
    document.addEventListener('DOMContentLoaded', () =>{
        const variant_container = document.getElementById('varianti-container')
        const variant_template = document.getElementById('variante-template')
        const addVariantButton = document.getElementById('add-variante')

        let index = 1;

        addVariantButton.addEventListener('click', ()=>{

            // const html = variant_template.innerHTML.replaceAll('__i__', index);
            variant_container.insertAdjacentHTML('beforeend', variant_template.innerHTML.replaceAll('__i__', index));
            index++;
        })

        variant_container.addEventListener('click', (e)=>{
            if (e.target.classList.contains('remove-variante')) {
                e.target.closest('.variante').remove()
            }
        })
    })
</script>
