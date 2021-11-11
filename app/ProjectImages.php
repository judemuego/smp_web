<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectImages extends Model
{
    protected $fillable = [
        'id',
        'photo',
        'description',
    ];
}
