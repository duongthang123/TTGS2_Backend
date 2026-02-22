<?php

namespace App\Services\Role;

use App\Repositories\Role\RoleRepository;

class RoleService
{
    protected $roleRepository;

    public function __construct(RoleRepository $repository)
    {
        $this->roleRepository = $repository;
    }

    public function getAll($request)
    {
        $perPage = isset($request['per_page']) ? $request['per_page'] : config('const.PER_PAGE.10');

        return $this->roleRepository->getAll($perPage);
    }

    public function getRoleById($id)
    {
        return $this->roleRepository->getRoleById($id);
    }

    public function createRole($request)
    {
        $data = $request->all();
        $data['guard_name'] = 'web';
        if ($request->has('permission_ids')) {
            $role = $this->roleRepository->create($data);
            $role->permissions()->attach($data['permission_ids']);
        } else {
            $role = $this->roleRepository->create($data);
        }

        return $role;
    }

    public function updateRole($request, $id)
    {
        $role = $this->roleRepository->findById($id);
        $dataUpdate = $request->all();
        $role->update($dataUpdate);
        $role->permissions()->sync($dataUpdate['permission_ids'] ?? []);

        return $role;
    }

    public function deleteRole($id)
    {
        return $this->roleRepository->delete($id);
    }
}
