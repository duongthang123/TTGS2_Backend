<?php

namespace App\Repositories\Role;

use App\Models\Role;
use App\Repositories\BaseRepository;

class RoleRepository extends BaseRepository
{
    protected $role;

    public function __construct(Role $role)
    {
        parent::__construct();
        $this->role = $role;
    }

    public function getModel()
    {
        // TODO: Implement getModel() method.
        return Role::class;
    }

    public function getRoleById($id)
    {
        return $this->role::with('permissions')->findOrFail($id);
    }

}
