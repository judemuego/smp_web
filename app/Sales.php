<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sales extends Model
{
    protected $fillable = [
        'id',
        'name',
        'position',
        'contact_no',
        'facebook_url',
        'twitter_url',
        'instagram_url',
        'email',
        'picture'

    ];
}
