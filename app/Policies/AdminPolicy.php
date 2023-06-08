<?php

namespace App\Policies;

use App\Models\Admin;
use Illuminate\Auth\Access\HandlesAuthorization;

class AdminPolicy
{
    use HandlesAuthorization;
    
    /**
     * Determine whether the user can view the ec product.
     *
     * @param Admin $user
     * @param Admin $admin
     * @return mixed
     */
    public function view(Admin $user, Admin $admin)
    {
        return true;
    }
    
    /**
     * アカウント作成
     *
     * @param Admin $user
     * @param Admin $admin
     * @return mixed
     */
    public function create(Admin $user, ?Admin $admin)
    {
        if ($user->authority == Admin::MANAGER) {
            return true;
        }
        return false;
    }
    
    /**
     * アカウント編集
     *
     * @param Admin $user
     * @param Admin $admin
     * @return mixed
     */
    public function update(Admin $user, Admin $admin)
    {
        if ($user->authority == Admin::MANAGER) {
            return true;
        }
        if ($user->id === $admin->id) {
            return true;
        }
        return false;
    }
    
    /**
     * 権限変更
     *
     * @param Admin $user
     * @param Admin $admin
     * @return mixed
     */
    public function changeAuthority(Admin $user, Admin $admin)
    {
        if ($user->authority == Admin::MANAGER) {
            return true;
        }
        if (!$admin->id) {
            return true;
        }
        return true;
    }
    
    /**
     * アカウント削除
     *
     * @param Admin $user
     * @param Admin $admin
     * @return mixed
     */
    public function delete(Admin $user, Admin $admin)
    {
        if ($user->id === $admin->id) {
            return false;
        }
        if ($user->authority == Admin::MANAGER) {
            return true;
        }
        return false;
    }
}
