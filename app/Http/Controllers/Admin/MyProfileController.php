<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateMyProfileRequest;
use Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class MyProfileController extends Controller
{
    /**
     * プロフィール編集画面の表示
     *
     * @return View
     */
    public function showEdit(): View
    {
        $admin = Auth::guard('admin')->user();

        return view('my_profile.edit', [
            'admin' => $admin
        ]);
    }

    /**
     * プロフィールの編集内容の保存
     *
     * @param UpdateMyProfileRequest $request
     * @return RedirectResponse
     */
    public function storeEdit(UpdateMyProfileRequest $request): RedirectResponse
    {
        $admin = Auth::guard('admin')->user();

        $update_data = [
            'email' => $request->input('email'),
            'name' => $request->input('name'),
        ];

        if($request->filled('password')){
            $update_data['password'] = Hash::make($request->input('password'));
        }

        $admin->fill($update_data)->save();

        return  redirect()
            ->route('my_profile.edit')
            ->with('success', true);
    }
}