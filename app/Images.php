<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Images extends Model
{
    protected $table = 'images';

    protected $filltable = ['product_id','color','img_url'];
    
    public $timestamp = true;

    // public function products () {
    // 	return $this->belongTo('App\Products');
    // }
}
