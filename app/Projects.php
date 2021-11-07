<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Projects extends Model
{
    protected $fillable = [
        'id',
        'project_name',
        'description',
        'location',
        'client',
        'design_architect',
        'scope',
        'completed_date',
        'size',
        'category'
    ];

}
