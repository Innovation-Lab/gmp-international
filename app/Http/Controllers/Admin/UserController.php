<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Carbon;

class UserController extends Controller
{
    /**
     * ユーザー一覧
     *
     * @param Request $request
     * @return Application|Factory|View
     */
    public function index(Request $request): View|Factory|Application
    {
        return view('admin.users.index', [
            'users' => User::all()
        ]);
    }
    
    /**
     * @param $id
     * @return Application|Factory|View
     */
    // public function detail($id): View|Factory|Application
    // {
    //     $user = User::find($id);

    //     return view('admin.users.detail', compact('user'));
    // }

    public function detail(): View
    {
        return view('admin.users.detail.index');
    }

    public function edit(): View
    {
        return view('admin.users.detail.edit');
    }

    // public function userEdit(): View
    // {
    //     return view('admin.users.detail.edit.userEdit');
    // }
    
    // /**
    //  * @param User $user
    //  * @return Application|Factory|View
    //  */
    // public function edit(User $user): View|Factory|Application
    // {
    //     return view('admin.users.edit', compact('user'));
    // }
    
    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function destroy(Request $request): RedirectResponse
    {
        $user = User::find($request->input('userId'));
        $timestamp = Carbon::now()->format('YmdHi');
        $user->fill([
            'email' => $user->email.'@'.$timestamp,
            'tel' => $user->tel.'@'.$timestamp,
            'firebase_uid' => $user->firebase_uid.'@'.$timestamp
        ])->save();
        $user->cars->each(function ($car) {
            $car->delete();
        });
        $user->delete();
        return redirect()->route('user.index');
    }
}
