<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    //
    protected $fillable = ['name','desc','type','image'];
    public function photos(){
        return $this->hasMany('App\Photo');
    }
}
