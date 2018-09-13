<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    protected $table = 'orders';

    protected $filltable = ['user_id', 'name', 'address', 'phone', 'email', 'status'];
    
    public $timestamp = true;


    // public function users() {
    // 	return $this->belongTo('App\Users');
    // }

    // public function products() {
    // 	return $this->belongTo('App\Products');
    // }
}
