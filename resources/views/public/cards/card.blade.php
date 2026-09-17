
<flux:card class="space-y-6">
    <div class="flex">
        <div class="flex-1">
            <flux:heading size="lg">{{$data['title']}} ({{$data['type']}}) {{$data['price']}}</flux:heading>
            @if($data['type']==='package')
               <sup> Disponibile dal {{$data['from']}} al {{$data['to']}} SCONTO {{$data['discount']}}</sup>
            @endif
            <flux:text class="mt-2">
                @include('public.cards.card-content',['data'=>$data])
            </flux:text>
        </div>
        <div class="-mx-2 -mt-2">
            <flux:button variant="ghost" size="sm" icon="x-mark" inset="top right bottom" />
        </div>
    </div>
    <div class="flex gap-4">
        <flux:spacer />
        @include('public.cards.card-action',['data'=>$data])
    </div>
</flux:card>
