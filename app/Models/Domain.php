<?php

namespace App\Models;

use App\Models\Figure;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Domain extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'description',
    ];

    protected static function booted()
    {

        static::creating(function ($domain) {
            $domain->slug = Str::slug($domain->name);
        });
    }

    public function figures()
    {
        return $this->belongsToMany(Figure::class, 'domain_figure');
    }
    
}
