


{{--@dd($data,$name)--}}
{{--@dd($data)--}}
<div x-data="{ ...@js($data), rows: @js($model->extend->meta ?? []) }">



    <template x-for="(row,i) in rows" :key="i">
        <div class="card">
            <div class="card-body">
                <div class="card-title">
                    <h5 style="color:white" x-text="'Variante ' + (i + 1)"></h5>
                </div>
                <div>
                    <template x-for="(field,key) in items" :key="key">
                        <div>
                            <template x-if="!['select','textarea'].includes(field.type)">
                                <div>
                                    <label class="block mb-1 text-sm text-zinc-300" x-text="field.label"></label>
                                    <flux:input
                                        x-bind:type="field.type"
                                        x-bind:name="`{{ $name }}[${i}][${key}]`"
                                        x-bind:placeholder="field.placeholder"
                                        x-bind:label="field.label"
                                        x-model="row[key]">
                                    </flux:input>
                                </div>

                            </template>
                            <template x-if="field.type === 'select'">
                                <div>
                                    <label class="block mb-1 text-sm text-zinc-300" x-text="field.label"></label>
                                    <flux:select
                                        x-bind:name="`{{ $name }}[${i}][${key}]`"
                                        x-model="row[key]">
                                        <option value="" x-text="field.placeholder || 'Seleziona…'"></option>
                                        <template x-for="opt in field.items" :key="opt">
                                            <option x-bind:value="opt" x-text="opt"></option>
                                        </template>
                                    </flux:select>
                                </div>
                            </template>
                            <template x-if="field.type ==='textarea'">
                                <div>
                                    <label class="block mb-1 text-sm text-zinc-300" x-text="field.label"></label>
                                    <flux:textarea
                                        x-bind:name="{{ $name }}[${i}][${key}]"
                                        x-bind:placeholder="field.placeholder"
                                        x-bind:rows="field.rows"
                                        x-model="row[key]">
                                    </flux:textarea>
                                </div>
                            </template>

                        </div>
                    </template>
                    <flux:button type="button" variant="primary" @click="rows.splice(i, 1)">Rimuovi elemento</flux:button>
                </div>
            </div>
        </div>
    </template>


    <flux:button type="button" variant="primary" @click="rows.push({})">Aggiungi elemento</flux:button>



</div>
