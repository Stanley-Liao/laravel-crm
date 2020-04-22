<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Horoscope extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'access_date',
        'name',
        'entirety_desc',
        'love_desc',
        'career_desc',
        'wealth_desc',                                    
        'entirety_rating',
        'love_rating',
        'career_rating',
        'wealth_rating'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [];
}
