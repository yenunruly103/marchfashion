<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table = 'news';

    protected $filltable = ['title','unsigned_title', 'image', 'description', 'content'];
    
    public $timestamp = true;
}
