<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $guarded = [];

    public function brand()
    {
        $this->belongsTo(Brand::class);
    }

    public function brandModel()
    {
        $this->belongsTo(BrandModel::class);
    }
}
