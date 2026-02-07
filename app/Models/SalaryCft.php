<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SalaryCft extends Model
{
    /** @use HasFactory<\Database\Factories\SalaryCftFactory> */
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'rank_id',
        'salary_cft',
        'from_year',
        'to_year',
        'note',
    ];
}
