
<tfoot>
<tr>

    @foreach($footerButton as $button)
        <td>
            <a href="{{route($button['route'])}}" >
                {{$button['label']}}
            </a>
        </td>


    @endforeach
</tr>

</tfoot>

