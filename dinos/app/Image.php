<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $uploaded_img = '/images/';

    protected $fillable = [
        'image_name'
    ];


    public function getFilenameAttribute($image) {

        return $this->uploaded_img . $image;
    }
}
