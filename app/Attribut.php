<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Element;
class Attribut extends Model
{
    protected $fillable = ['name','content','element_id']; 
    public function element()
    {
        return $this->belongsTo(Element::class);
       
    }
}
