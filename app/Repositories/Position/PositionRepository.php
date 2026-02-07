<?php

namespace App\Repositories\Position;

use App\Models\Position;
use App\Repositories\BaseRepository;

class PositionRepository extends BaseRepository
{
    protected $position;

    public function __construct(Position $position)
    {
        parent::__construct();
        $this->position = $position;
    }

    public function getModel()
    {
        // TODO: Implement getModel() method.
        return Position::class;
    }

}
