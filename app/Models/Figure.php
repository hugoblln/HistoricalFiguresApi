<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Figure extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'birth_name',
        'birth_date',
        'birth_place',
        'death_date',
        'death_place',
        'nationality',
        'short_description',
        'gender',
        'portrait_url',
        'biography',
        'isVerified',
    ];
}
