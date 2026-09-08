


{{--@dd($data,$name)--}}
{{--@dd($data)--}}
<div x-data="{ ...@js($data), rows: [{}] }">



    <template x-for="(row,i) in rows" :key="i">
        <div class="card">
            <div class="card-body">
                <div class="card-title">
                    <h5 style="color:white" x-text="i+1"></h5>
                </div>
                <div>
                    <template x-for="(field,key) in items" :key="key">
                        <div>
                            <template x-if="field.type !== 'select'">
                                <flux:input
                                    x-bind:type="field.type"
                                    x-bind:name="`{{ $name }}[variants][${i}][${key}]`"
                                    x-bind:placeholder="field.placeholder"
                                    x-model="row[key]">
                                </flux:input>
                            </template>
                        </div>
                    </template>
                </div>
            </div>
        </div>
    </template>


    <flux:button type="button" variant="primary" @click="rows.push({})">Aggiungi elemento</flux:button>


</div>
