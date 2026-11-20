<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Prisoner extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'date',
        'gender',
        'citizen_number',
        'address',
        'permanent_address',
        'crime',
        'sentence',
        'admitted_at',
        'status',
    ];

    protected function casts()
    {
        return [
            'date' => 'date',
            'admitted_at' => 'date',
        ];
    }

    protected function relatives()
    {
        return $this->belongsToMany(Relative::class, 'prisoner_relatives')
            ->withPivot('id', 'relationship')
            ->withTimestamps();
    }

    public function visitSessions()
    {
        return $this->hasMany(VisitSession::class);
    }
}
