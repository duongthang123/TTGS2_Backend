<?php

namespace App\Repositories\Unit;

use App\Models\Unit;
use App\Repositories\BaseRepository;

class UnitRepository extends BaseRepository
{
    protected $unit;

    public function __construct(Unit $unit)
    {
        parent::__construct();
        $this->unit = $unit;
    }

    public function getModel()
    {
        return Unit::class;
    }
}
