<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Relative extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'date',
        'gender',
        'citizen_number',
        'phone',
        'address'
    ];

    protected function casts()
    {
        return [
            'date' => 'date',
        ];
    }

    public function prisoners()
    {
        return $this->belongsToMany(
            Prisoner::class,
            'prisoner_relatives'
        )
            ->withPivot('id', 'relationship')
            ->withTimestamps();
    }
}
