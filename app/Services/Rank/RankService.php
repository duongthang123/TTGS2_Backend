<?php

namespace App\Services\Rank;

use App\Repositories\Rank\RankRepository;

class RankService
{
    protected $rankRepository;

    public function __construct(RankRepository $rankRepository)
    {
        $this->rankRepository = $rankRepository;
    }

    public function getAll()
    {
        return $this->rankRepository->getAll();
    }

    public function createRank($data)
    {
        return $this->rankRepository->create($data);
    }

    public function getRankById($id)
    {
        return $this->rankRepository->findById($id);
    }

    public function updateRank($data, $id)
    {
        return $this->rankRepository->update($data, $id);
    }

    public function deleteRank($id)
    {
        return $this->rankRepository->delete($id);
    }
}
