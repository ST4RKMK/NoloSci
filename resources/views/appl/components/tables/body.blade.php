

<tbody>

@foreach($data as $item)

    <tr>

        @foreach($headers as $k=>$v)
            <td>
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
