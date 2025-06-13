<?php

namespace App\Models;

use App\Models\Figure;
use Illuminate\Database\Eloquent\Model;

class Period extends Model
{
    protected $fillable = [
        'name',
        'start_year',
        'end_year',
        'description',
    ];

    /**
     * The figures that belong to the period.
     */
    public function figures()
    {
        return $this->belongsToMany(Figure::class);
    }
}
