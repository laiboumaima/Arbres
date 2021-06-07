<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Arbre extends Model
{
    
    protected $fillable = ['name']; 
    public function elements(){
        return $this->hasMany(Element::class);
    }
}
