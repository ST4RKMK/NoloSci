@props([
    'data',
    'action',
    'method',
    'buttonLabel'
]
)



<div class="card">
    <div class="card-body">
        <form method="POST" action="{{ route($route->action['as'],request()->route()->parameters()) }}">
            @csrf
            @if(in_array('PUT',$route->methods))
                @method('PUT')
            @endif

            <div class="grid grid-cols-2 gap-2 py-2 px-4">
                @foreach($data as $k => $v)
                    @include('appl.components.forms.input', ['name' => $k, 'data' => $v])
                @endforeach
            </div>

            <div>
                <flux:button type="submit" variant="primary" color="amber">Salva</flux:button>
            </div>
        </form>
    </div>
</div>
