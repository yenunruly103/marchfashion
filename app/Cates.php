<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cates extends Model
{
    protected $table = 'cates';

    protected $filltable = ['name'];
    
    public $timestamp = true;

    // public function products() {
    // 	return $this->hasMany('App\Products');
    // }
}
