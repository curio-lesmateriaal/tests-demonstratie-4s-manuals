<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;

    public function types()
    {
        return $this->hasMany(Type::class);
    }

    /*
    public function members()
    {
        return $this->hasManyThrough(Member::class, Group::class);
    }
    */

    // Returns name of the object, where / are stripped for the url
    public function getNameUrlEncodedAttribute()
    {
        $name_url_encoded = str_replace('/','',$this->name);

        return $name_url_encoded;
    }
}
