


{{--@dd($data,$name)--}}
{{--@dd($data)--}}
<div x-init="" x-data="@js($data)">



    <template x-for="(vvv,kkk) in items??[]" :key="kkk">
        <div class="card">
            <div class="card-body">
                <div class="card-title">
                    <h5 style="color:white" x-text="vvv.label || kkk"></h5>
                </div>
                <div>
{{--                    <template x-for="(vvvv,kkkk) in vvv" :key="kkkk">--}}
                        <div>
                            <template x-if="vvv.type === 'text' || vvv.type === 'number'">
                                <flux:input
                                    x-bind:type="vvv.type"
{{--                                    x-bind:name="'meta[items][' + kkk + '][value]'"--}}
                                    x-bind:name="name[kkk]"
                                    x-bind:value="vvv.value"
                                    x-bind:placeholder="vvv.placeholder">
                                </flux:input>
                            </template>
                            <template x-if="vvv.type === 'select'">
                                <flux:select wire:model="testiamo" placeholder="Seleziona....">
                                    <template x-for="(vvvv,kkkk) in vvv[items]??[]">
                                        <flux:select.option value="vvvv" x-text="vvvv"></flux:select.option>
                                    </template>
                                </flux:select>
{{--                                <flux:select--}}
{{--                                    x-bind:name="name[kkk]"--}}
{{--                                    x-bind:value="vvv.value">--}}
{{--                                    <flux:select.option value="">Seleziona</flux:select.option>--}}
{{--                                    <template x-for="(vvvv,kkkk) in vvv[items]??{}" :key="kkkk">--}}
{{--                                        <flux:select.option--}}
{{--                                            value ="kkkk"--}}
{{--                                            x-text="vvvv">--}}
{{--                                        </flux:select.option>--}}
{{--                                    </template>--}}
{{--                                </flux:select>--}}

                            </template>
                        </div>
{{--                    </template>--}}
                </div>
            </div>
        </div>
    </template>


    <flux:button variant="primary" x-click="items.push({})">Aggiungi elemento</flux:button>


</div>
