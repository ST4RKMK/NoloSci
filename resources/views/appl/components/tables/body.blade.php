

<tbody>

@foreach($data as $item)

    <tr class="border-b border-zinc-200">

        @foreach($headers as $k=>$v)
            <td class="px-4 py-2">
            @if($k!=='action')
               {{$item[$v]}}
            @else
                @include('appl.components.tables.buttons',['data'=>$item])
            @endif
            </td>
        @endforeach

    </tr>


@endforeach


</tbody>
