
{{--@dd($model)--}}
{{--@dd($model->active ?? $v['value'], $v['items'])--}}
{{--<div>--}}
{{--    <label class="block text-sm font-medium mb-2">{{$v['label']}}</label>--}}
{{--    @foreach($v['items'] as $item)--}}
{{--        <input type="radio" name="{{$v['label']}}" value="{{(int)($model->active ?? $v['value'])}}" label="{{$item['label']}}"/>--}}
{{--    @endforeach--}}
{{--</div>--}}


<flux:radio.group label="{{$v['label']}}" value="{{(int)($model->active ?? $v['value']) }}" >
    @foreach($v['items'] as $item)
        <flux:radio value="{{(int)($item['value'])}}" label="{{$item['label']}}"/>
    @endforeach
</flux:radio.group>

{{--<input:radio.group label="{{$v['label']}}" value="{{(int)($model->active ?? $v['value']) }}" >--}}


