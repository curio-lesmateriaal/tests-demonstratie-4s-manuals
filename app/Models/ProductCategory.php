<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    use HasFactory;

    public function types()
    {
        return $this->belongsToMany(Type::class);
    }

    // Returns name of the object, where / are stripped for the url
    public function getNameUrlEncodedAttribute()
    {
        $name_url_encoded = str_replace('/','',$this->name);

        return $name_url_encoded;
    }
}
