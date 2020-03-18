<?php

namespace App;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{

    protected $fillable = ['image_name', 'image_path'];


    public function imageable()
    {
        return $this->morphTo();
    }

}
