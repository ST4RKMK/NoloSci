{{--@dump($v)--}}
{{--<style>--}}
{{--    table, thead, td {--}}
{{--        border: 1px solid black;--}}
{{--        border-collapse: collapse;--}}
{{--        text-align: center;--}}
{{--    }--}}
{{--</style>--}}
<div class="max-w-sm rounded overflow-hidden shadow-lg p-2 m-2" style="min-width: 350px">
    <div class="px-2 py-2">
        <div class="font-bold text-xl mb-2">{{$v['name']}}</div>
        <p class="text-gray-700 text-base border-b-2">
            {{$v['description']}}
        </p>
        <p class="text-gray-700 text-base">
            <span class="font-bold">Dal </span>{{$v['available_from']}}
        </p>
        <p class="text-gray-700 text-base">
            <span class="font-bold">Al </span>{{$v['available_to']}}
        </p>
    </div>
    <div class="px-6 pt-4 pb-2">
        <flux:button variant="primary">Aggiungi</flux:button>
    </div>
{{--    <table>--}}
{{--            <thead>--}}
{{--                <th>{{$v['name']}}</th>--}}
{{--            </thead>--}}
{{--            <tbody>--}}
{{--            <tr>--}}
{{--                <td>{{$v['available_from']}}</td>--}}
{{--                <td>{{$v['available_to']}}</td>--}}
{{--            </tr>--}}
{{--            <tr>--}}
{{--                <td colspan="2" >{{$v['description']}}</td>--}}
{{--            </tr>--}}


{{--            </tbody>--}}



{{--    </table>--}}




</div>
