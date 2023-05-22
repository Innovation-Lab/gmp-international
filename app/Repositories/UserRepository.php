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
    
    /**
     * @param array $user
     * @param array $product
     * @return mixed
     */
    public function createWithProduct(
        array $user,
        array $product
    ): mixed
    {
        return  DB::transaction(function () use ($user, $product) {
            $user = User::create([
                'email' => data_get($user, 'email'),
                'password' => \Illuminate\Support\Facades\Hash::make(data_get($user, 'password')),
                'last_name' => data_get($user, 'last_name'),
                'first_name' => data_get($user, 'first_name'),
                'last_name_kana' => data_get($user, 'last_name_kana'),
                'first_name_kana' => data_get($user, 'first_name_kana'),
                'zip_code' => data_get($user, 'zip_code'),
                'prefecture' => data_get($user, 'prefecture'),
                'address_city' => data_get($user, 'address_city'),
                'address_block' => data_get($user, 'address_block'),
                'address_building' => data_get($user, 'address_building'),
                'tel' => data_get($user, 'tel'),
                'is_catalog' => data_get($user, 'is_catalog'),
                'is_dm' => data_get($user, 'is_dm')
            ]);
        });
        
    }
}
