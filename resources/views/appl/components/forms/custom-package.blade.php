



<div x-data="@js($data)">

    <template x-for="(e,k) in value" :key="k">
        <select x-bind:name="`multi_morph[${k}][toable]`">
            <template x-for="(a,kl) in items">
            <option x-bind:value="a.instance_of+'::'+a.id" ><span x-text="a.name"></span></option>

            </template>
        </select>
    </template>


    <flux:button type="button" variant="primary" @click="value.push({})">Aggiungi elemento</flux:button>


</div>

