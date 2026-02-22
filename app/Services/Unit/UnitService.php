<?php

namespace App\Services\Unit;

use App\Repositories\Unit\UnitRepository;

class UnitService
{
    protected $unitRepository;

    public function __construct(UnitRepository $unitRepository)
    {
        $this->unitRepository = $unitRepository;
    }

    public function getAll($request)
    {
        $perPage = isset($request['per_page']) ? $request['per_page'] : config('const.PER_PAGE.10');

        return $this->unitRepository->getAll($perPage);
    }

    public function createUnit($data)
    {
        return $this->unitRepository->create($data);
    }

    public function findUnitById($id)
    {
        return $this->unitRepository->findById($id);
    }

    public function updateUnit($data, $id)
    {
        return $this->unitRepository->update($data, $id);
    }

    public function deleteUnit($id)
    {
        return $this->unitRepository->delete($id);
    }

}
