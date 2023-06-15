<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Http\StoreAccountRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

interface UserRepositoryInterface
{
    public function search(Request $request);
    public function store(User $user, Request $request);
    public function accountUpdate(User $user, Request $request);
    public function userUpdate(User $user, Request $request);
    public function destroy($user);
    public function createWithProduct(array $users, array $products);
    public function importUser(array $csv);
}
