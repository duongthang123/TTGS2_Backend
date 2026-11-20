<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VisitSession extends Model
{
    protected $fillable = [
        'prisoner_id',
        'visit_date',
        'check_in_at',
        'note',
    ];

    protected function casts(): array
    {
        return [
            'visit_date' => 'date',
        ];
    }

    public function prisoner()
    {
        return $this->belongsTo(Prisoner::class);
    }

    public function participants()
    {
        return $this->hasMany(VisitSessionRelative::class);
    }
}
