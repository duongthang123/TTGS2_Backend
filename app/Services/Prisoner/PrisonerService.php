<?php

namespace App\Services\Prisoner;

use App\Repositories\Prisoner\PrisonerRepository;

class PrisonerService
{
    protected $prisonerRepository;

    public function __construct(PrisonerRepository $prisonerRepository)
    {
        $this->prisonerRepository = $prisonerRepository;
    }

    public function getAll($request)
    {
        $perPage = isset($request['per_page']) ? $request['per_page'] : config('const.PER_PAGE.7');
        $search = trim($request['search'] ?? '');

        return $this->prisonerRepository->getAll($perPage, $search);
    }

    public function getById($id)
    {
        return $this->prisonerRepository->findById($id);
    }

    public function createPrisoner($data)
    {
        return $this->prisonerRepository->create($data);
    }

    public function updatePrisoner($data, $id)
    {
        return $this->prisonerRepository->update($data, $id);
    }

    public function deletePrisoner($id)
    {
        return $this->prisonerRepository->delete($id);
    }
}
