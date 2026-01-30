<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalaryCft extends Model
{
    /** @use HasFactory<\Database\Factories\SalaryCftFactory> */
    use HasFactory;

    protected $fillable = [
        'user_id',
        'rank_id',
        'salary_cft',
        'from_year',
        'to_year',
        'note',
    ];
}
