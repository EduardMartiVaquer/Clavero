<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Story extends Model
{
    protected $fillable = [
        'title', 'description', 'description2', 'image1', 'image2', 'image3', 'image4', 'image5', 'image6'
    ];

    protected $table = "stories";
}
