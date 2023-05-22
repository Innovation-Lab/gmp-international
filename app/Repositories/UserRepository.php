<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\StoreAccountRequest;
use App\Repositories\UserRepositoryInterface;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Hash;

class UserRepository implements UserRepositoryInterface
{
    public function search(Request $request)
    {

    }

    public function store(User $user, Request $request)
    {

    }

    public function accountUpdate(User $user, Request $request)
    {
        return DB::transaction(function () use ($user, $request) {
            $data = $request->all();
            $data['password'] = Hash::make($data['password']);
            unset($data['password_confirmation']);
            unset($data['_token']);
            $user->fill($data)->save();
            return $user;
        });
    }

    public function userUpdate(User $user, Request $request)
    {
        $data = $request->all();
        unset($data['_token']);
        $user->fill($data)->save();
        return $user;
    }

    public function destroy(User $user)
    {

    }
}
