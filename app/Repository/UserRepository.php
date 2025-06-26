<?php

namespace App\Repository\User;

use App\Models\User;

class UserRepository {

    public function GetUserAndAdmin()
    {
        $getUser = User::query()
            ->where('role', 'user')
            ->get();
        $getAmin = User::query()
            ->where('role', 'admin')
            ->get();
        return view()->with('getUser', $getUser)
            ->with('getAmin', $getAmin);
    }

    public function getById($id)
    {
        return User::find($id);
    }

    public function create($data)
    {
        return User::create($data);
    }

    public function update($data, $id)
    {
        $user = User::find($id);
        if ($user) {
            $user->update($data);
            return $user;
        }
        return null;
    }

}