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

    public function getAll($request)
    {
        $perPage = isset($request['per_page']) ? $request['per_page'] : config('const.PER_PAGE.10');

        return $this->positionRepository->getAll($perPage);
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
