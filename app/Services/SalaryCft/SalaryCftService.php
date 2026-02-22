<?php

namespace App\Services\SalaryCft;

use App\Models\SalaryCft;
use App\Repositories\SalaryCft\SalaryCftRepository;
use App\Repositories\User\UserRepository;
use Illuminate\Support\Facades\DB;

class SalaryCftService
{
    protected $salaryCftRepository;
    protected $userRepo;

    public function __construct(SalaryCftRepository $salaryCftRepository, UserRepository $userRepo)
    {
        $this->salaryCftRepository = $salaryCftRepository;
        $this->userRepo = $userRepo;
    }

    public function getAll($request)
    {
        $perPage = isset($request['per_page']) ? $request['per_page'] : config('const.PER_PAGE.10');

        return $this->salaryCftRepository->getAll($perPage);
    }

    public function createSalaryCft($data)
    {
        $salaryCftExists = SalaryCft::query()
                            ->where('user_id', $data['user_id'])
                            ->where('from_year', '<=', $data['to_year'])
                            ->where('to_year' , '>=', $data['from_year'])
                            ->exists();
        if ($salaryCftExists) {
            throw new \Exception('Khoảng năm bị trùng.');
            return false;
        }

        return $this->salaryCftRepository->create($data);
    }

    public function getSalaryCftById($id)
    {
        return $this->salaryCftRepository->findById($id);
    }

    public function updateSalaryCft($data, $id)
    {
        $salaryCftExists = SalaryCft::query()
            ->where('user_id', $data['user_id'])
            ->where('from_year', '<=', $data['to_year'])
            ->where('to_year' , '>=', $data['from_year'])
            ->where('id' , '!=', $id)
            ->exists();
        if ($salaryCftExists) {
            throw new \Exception('Khoảng năm bị trùng.');
            return false;
        }

        return $this->salaryCftRepository->update($data, $id);
    }

    public function deleteSalaryCftById($id)
    {
        return $this->salaryCftRepository->delete($id);
    }
}
