<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VisitSessionRelative extends Model
{
    protected $fillable = [
        'visit_session_id',
        'prisoner_relative_id',
    ];

    public function visitSession()
    {
        return $this->belongsTo(VisitSession::class);
    }

    public function prisonerRelative()
    {
        return $this->belongsTo(PrisonerRelative::class);
    }
}
