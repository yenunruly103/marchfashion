<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $table = 'products';

    protected $filltable = ['name','cates_id','price','discount','size','thumbnail','view','status'];
    
    public $timestamp = true;

//     public function cates() {
//     	return $this->belongTo('App\Cates');
//     }

//     public function images() {
//     	return $this->hasMany('App\Images');
//     }

//     public function orders() {
//     	return $this->hasMany('App\Orders');
//     }
// }
}