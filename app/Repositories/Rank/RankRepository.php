<?php

namespace App\Repositories\Rank;

use App\Models\Rank;
use App\Repositories\BaseRepository;

class RankRepository extends BaseRepository
{
    protected $rank;

    public function __construct(Rank $rank)
    {
        parent::__construct();
        $this->rank = $rank;
    }

    public function getModel()
    {
        // TODO: Implement getModel() method.
        return Rank::class;
    }

}
