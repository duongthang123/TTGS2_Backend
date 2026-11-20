<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PrisonerRelative extends Model
{
    protected $table = 'prisoner_relatives';

    protected $fillable = [
        'prisoner_id',
        'relative_id',
        'relationship'
    ];

    public function prisoner()
    {
        return $this->belongsTo(Prisoner::class);
    }

    public function relative()
    {
        return $this->belongsTo(Relative::class);
    }

    public function visitSessionRelatives()
    {
        return $this->hasMany(VisitSessionRelative::class);
    }
}
