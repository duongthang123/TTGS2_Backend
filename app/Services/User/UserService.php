<?php

namespace App\Services\User;

use App\Repositories\User\UserRepository;
use Illuminate\Support\Facades\DB;

class UserService
{
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function getAll()
    {
        return $this->userRepository->getAll();
    }

    public function getUserById($id)
    {
        return $this->userRepository->findById($id);
    }

    public function createUser($request)
    {
        $dataCreate = $request->all();
        try {
            DB::beginTransaction();
            $dataCreate['password'] = config('const.PASSWORD_DEFAULT');
            if($request->has('roles_id')) {
                $user = $this->userRepository->create($dataCreate);
                $user->roles()->attach($request['roles_id']);
            } else {
                $user = $this->userRepository->create($dataCreate);
            }
            DB::commit();
            return $user;
        } catch (\Exception $e)
        {
            DB::rollBack();
            return false;
        }
    }

    function updateUser($request, $id)
    {
        $dataUpdate = $request->all();

        try {
            DB::beginTransaction();
            if($request->password) {
                $dataUpdate['password'] = $request->password;
            }
            if($request->has('roles_id')) {
                $user = $this->userRepository->update($dataUpdate, $id);
                $user->roles()->sync($request['roles_id']);
            } else {
                $user = $this->userRepository->create($dataUpdate);
            }
            DB::commit();
            return $user;
        } catch (\Exception $exception)
        {
            DB::rollBack();
            return false;
        }
    }

    public function deleteUserById($id)
    {
        return $this->userRepository->delete($id);
    }
}
