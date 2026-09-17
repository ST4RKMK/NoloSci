<?php

namespace App\Models\System;

use App\Concerns\Models\HasStatus;
use App\Models\GloablWrapMdl;
use App\Observers\Core\PackageObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Model;

#[ObservedBy([PackageObserver::class])]
class Package extends GloablWrapMdl
{
    //
    use HasStatus;
}
