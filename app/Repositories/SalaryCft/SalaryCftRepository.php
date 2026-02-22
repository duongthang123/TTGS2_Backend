<?php

namespace App\Repositories\SalaryCft;

use App\Models\SalaryCft;
use App\Repositories\BaseRepository;

class SalaryCftRepository extends BaseRepository
{
    protected $salaryCft;

    public function __construct(SalaryCft $salaryCft)
    {
        parent::__construct();
        $this->salaryCft = $salaryCft;
    }

    public function getModel()
    {
        return SalaryCft::class;
    }
}
