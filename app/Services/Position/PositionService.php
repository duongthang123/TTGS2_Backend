<?php

namespace App\Services\Position;

use App\Repositories\Position\PositionRepository;

class PositionService
{
    protected $positionRepository;

    public function __construct(PositionRepository $positionRepository)
    {
        $this->positionRepository = $positionRepository;
    }

    public function getAll()
    {
        return $this->positionRepository->getAll();
    }

    public function createPosition($data)
    {
        return $this->positionRepository->create($data);
    }

    public function findPositionById($id)
    {
        return $this->positionRepository->findById($id);
    }

    public function updatePosition($data, $id)
    {
        return $this->positionRepository->update($data, $id);
    }

    public function deletePosition($id)
    {
        return $this->positionRepository->delete($id);
    }
}
