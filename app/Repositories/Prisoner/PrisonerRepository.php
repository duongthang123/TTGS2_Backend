<?php

namespace App\Repositories\Prisoner;

use App\Models\Prisoner;
use App\Repositories\BaseRepository;

class PrisonerRepository extends BaseRepository
{
    protected $prisoner;

    public function __construct(Prisoner $prisoner)
    {
        parent::__construct();
        $this->prisoner = $prisoner;
    }

    public function getModel()
    {
        return Prisoner::class;
    }

    public function getAll($limit, $search = '')
    {
        $query = $this->prisoner->newQuery()->latest('id');

        if ($search !== '') {
            $query->where(function ($query) use ($search) {
                $query->where('name', 'like', "%{$search}%")
                    ->orWhere('citizen_number', 'like', "%{$search}%");
            });
        }

        return $query->paginate($limit)->withQueryString();
    }
}
