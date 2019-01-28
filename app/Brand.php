<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $fillable = [
      'name', 'year_of_creation'
    ];

    public function brandModels()
    {
        return $this->hasMany(BrandModel::class);
    }

    public function cars()
    {
        return $this->hasMany(Car::class);
    }
}
