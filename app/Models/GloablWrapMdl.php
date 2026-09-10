<?php

namespace App\Models;

use App\Models\System\Extend;
use App\Models\System\MultiMorph;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GloablWrapMdl extends Model
{
    //

    use SoftDeletes;

    protected $guarded = [];

    protected $appends=[
        'extend'
        ];

    protected $casts=[
        'meta'=>'array',
        'avaiable_from'=>'datetime',
        'avaiable_to'=>'datetime'
    ];



    public function getExtendAttribute(){
        return $this->extend()->first();
    }
    public function extend(){
        return $this->morphOne(Extend::class, 'extendable');
    }

    public function extendable(){
        return $this->morphTo();
    }

    public function toable(){
        return $this->morphTo();
    }
    public function fromable(){
        return $this->morphTo();
    }
    public function from(){
        return $this->morphMany(MultiMorph::class, 'fromable');
    }
    public function to(){
        return $this->morphMany(MultiMorph::class, 'toable');
    }



}
