<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectCategories extends Model
{
    protected $fillable = [
        'id',
        'name',
        'description',
    ];
}
