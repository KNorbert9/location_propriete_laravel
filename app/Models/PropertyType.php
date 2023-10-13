<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PhpParser\Builder\Property;

class PropertyType extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function property()
    {
        return $this->hasMany(Property::class);
    }
}
