<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class PasswordResetController extends Controller
{
    // パスワード書き換えます
    public function reset(Request $request)
    {
        $user = User::find($request->id);
        $user->fill([
            'password' => Hash::make($request->password)
        ])->save();
        return view('web.auth.complete');
    }
}
