

{{--@dd($data)--}}
<div x-data="@js($data)">

    <div class="card-rent-body">
        <div class="card-title">
            <h5 style="color: white" x-text="cliente"></h5>
        </div>
        <div>
            <template x-for="(field,key) in items" :key="key">
                <div>
                    <template x-if="!['select','textarea'].includes(field.type)">
                        <div>
                            <label class="block mb-1 text-sm text-zinc-300" x-text="field.label"></label>
                            <flux:input x-bind:type="field.type" x-bind:name="'{{$name}}[${key}]}'" x-bind:placeholder="field.placeholder" x-bind:label="field.label">
                            </flux:input>
                        </div>
                    </template>
                    <template x-if="field.type === 'select'">
                        <div>
                            <label class="block mb-1 text-sm text-zinc-300" x-text="field.label"></label>
                            <flux:select x-bind:name="'{{$name}}[${key}]}'" placeholder="Seleziona il livello...">
{{--                                <option value="" x-text="field.placeholder "></option>--}}
                                <template x-for="option in field.items" :key="option">
                                    <option x-bind:value="option" x-text="option"></option>
                                </template>
                            </flux:select>
                        </div>
                    </template>
                    <template x-if="field.type === 'textarea'">
                        <div>
                            <label class="block mb-1 text-sm text-zinc-300" x-text="field.label"></label>
                            <flux:textarea x-bind:name="'{{$name}}[${key}]}'" x-bind:placeholder="field.placeholder" x-bind:rows="field.rows">
                            </flux:textarea>
                        </div>
                    </template>
                </div>
            </template>

        </div>
    </div>





</div>
