<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BrandModel extends Model
{
    protected $fillable = [
        'name','brand_id'
    ];

    public function brand()
    {
        $this->belongsTo(Brand::class);
    }
}
