

{{--@dd($data)--}}

<div x-data="@js($data)">
    <template x-for="(e,k) in value" :key="k">
        <div style="padding: .5rem auto;margin:.5rem auto;">
            <label class="block mb-1 text-sm text-zinc-300" x-text="'Selezionare un prodotto o un pacchetto'"></label>

            <flux:select x-bind:name="`multi_morph[${k}][toable]`">
                <template x-for="(a,kl) in items">
                    <option x-bind:value="a.match" x-bind:selected="a.match === e.match"><span x-text="a.name"></span></option>

                </template>
            </flux:select>
            <flux:button type="button" style="margin: .5rem auto;" variant="primary" @click="value.splice(k, 1)">Rimuovi elemento</flux:button>
        </div>


    </template>


    <flux:button type="button" variant="primary" @click="value.push({})">Aggiungi elemento</flux:button>


</div>

