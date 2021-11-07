<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Testimonials extends Model
{
    protected $fillable = [
        'id',
        'name',
        'company',
        'testimonial'
    ];

}
