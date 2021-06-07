<?php

namespace App;
use App\Arbre;
use App\Attribut;
use Illuminate\Database\Eloquent\Model;

class Element extends Model
{  
    protected $fillable = ['name','arbre_id']; 
    public function attributs()
    {
        return $this->hasMany(Attribut::class);
       
    }
    public function arbre(){
        return $this->belongsTo(Arbre::class);
    }
}
