<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Domain extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'description',
    ];

    public function Booted()
    {

        static::creating(function ($domain) {
            $domain->slug = str_slug($domain->name);
        });
    }
    
}
