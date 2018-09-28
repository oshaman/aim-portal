<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoryImage extends Model
{
    protected $fillable = ['path', 'imgalt', 'imgtitle'];
}
