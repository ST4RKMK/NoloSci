<?php

use Livewire\Component;

new class extends Component
{
    //

    public $data=[];


    #[\Livewire\Attributes\On('addToCart')]
    public function addElement($data){
        $this->data[]=array_merge($this->data,$data);
    }

    #[\Livewire\Attributes\On('remToCart')]
    public function remeveme($index){
        unset($this->data[$index]);
    }




};
?>

<div class="drawer">
    <input id="my-drawer-1" type="checkbox" class="drawer-toggle" />
    <div class="drawer-content">
        <!-- Page content here -->
        <label for="my-drawer-1" class="btn drawer-button">Open drawer</label>
    </div>
    <div class="drawer-side">
        <label for="my-drawer-1" aria-label="close sidebar" class="drawer-overlay"></label>
        <ul class="menu bg-base-200 min-h-full w-80 p-4">
            <!-- Sidebar content here -->
           @foreach($data as $k=>$item)
               <li wire:key="{{$k}}" wire:click="$dispatch('remToCart',{index:{{$k}}})">
                    {{$item['title']}}
               </li>
            @endforeach
        </ul>
        jù total {{array_sum(array_column($data,'price'))}} Euro non pannocchie
    </div>
</div>
