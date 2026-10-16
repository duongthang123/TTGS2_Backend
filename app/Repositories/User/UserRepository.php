<?php

namespace App\Repositories\User;

use App\Models\User;
use App\Repositories\BaseRepository;

class UserRepository extends BaseRepository
{
    protected $user;

    public function __construct(User $user)
    {
        parent::__construct();
        $this->user = $user;
    }

    public function getModel()
    {
        return User::class;
    }

    public function getAll($limit, $search = '', $role = null, $unitId = null)
    {
        $query = $this->user->newQuery()->latest('id');

        if ($role !== null) {
            $query->whereHas('roles', function ($roleQuery) use ($role) {
                $roleQuery->where('name', $role);
            });
        }

        if ($search !== '') {
            $query->where(function ($query) use ($search) {
                $query->where('name', 'like', "%{$search}%")
                    ->orWhere('code', 'like', "%{$search}%")
                    ->orWhere('phone', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%");
            });
        }

        if ($unitId !== null && $unitId !== '') {
            $query->where('unit_id', $unitId);
        }

        return $query->with('latestSalaryCft')->paginate($limit)->withQueryString();
    }
}
