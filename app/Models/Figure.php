<?php

namespace App\Models;

use App\Models\Domain;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Figure extends Model
{
    use HasFactory;

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

    public function domains()
    {
        return $this->belongsToMany(Domain::class, 'domain_figure');
    }
}
