


{{--@dd($data,$name)--}}
{{--@dd($data)--}}
<div x-init="" x-data="@js($data)">



    <template x-for="(vvv,kkk) in items??[]" :key="kkk">
        <div class="card">
            <div class="card-body">
                <div class="card-title">
                    <h5>Elemento  <span x-text="kkk"></span></h5>
                </div>
                <div>
                    <template x-for="(vvvv,kkkk) in items" :key="kkkk">
                        <div>
                            <template x-if="vvvv.type==='text'">
                                <flux:input x-bind:type="vvvv.type" x-bind:name="name[kkk][kkkk]" x-bind:value="vvv[kkkk]"></flux:input>
                            </template>
                        </div>
                    </template>
                </div>
            </div>
        </div>
    </template>


    <flux:button variant="primary" x-click="items.push({})">Aggiungi elemento</flux:button>


</div>
