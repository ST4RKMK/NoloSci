


@foreach($buttons as $btn)
    @if($btn['type']==='delete')
        <form method="post" action="{{route($btn['route'],array_combine(array_keys($btn['parameters']),\Illuminate\Support\Arr::only($data,array_values($btn['parameters']))))}}">
            @method('DELETE')
            @csrf
            <button type="submit">Delete</button>
        </form>
    @else
        <a href="{{route($btn['route'],array_combine(array_keys($btn['parameters']),\Illuminate\Support\Arr::only($data,array_values($btn['parameters']))))}}">{{$btn['label']}}</a>
    @endif
@endforeach
