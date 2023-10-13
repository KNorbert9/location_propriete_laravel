<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class property extends Model
{
    use HasFactory;


    protected $guarded = [];

    public function ameneties()
    {
        return $this->belongsToMany(Ameneties::class, 'property_ameneties');
    }

    public function propertyType()
    {
        return $this->belongsTo(PropertyType::class);
    }
}
