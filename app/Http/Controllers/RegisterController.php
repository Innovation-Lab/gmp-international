<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use App\Http\Requests\StoreAccountRequest;
use App\Http\Requests\StoreInformationRequest;
use App\Providers\RouteServiceProvider;

class RegisterController extends Controller
{
    public function login()
    {
        return view('web.auth.login');
    }

    public function terms()
    {
        return view('web.register.terms');
    }

    public function account()
    {
        return view('web.register.account');
    }
    
    /**
     * @param StoreAccountRequest $request
     */
    public function storeAccount(StoreAccountRequest $request)
    {
        // フォームから送信されたデータをセッションに保存する処理
        $email = $request->input('email');
        $password = $request->input('password');
        Session::put('session_account', [
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ]);
        
        return redirect()->route('register.info');
    }
    
    /**
     * @return Application|Factory|View
     */
    public function userInfo(): View|Factory|Application
    {
        return view('web.register.user');
    }
    
    /**
     * @param Request $request
     * @return Application|Factory|View
     */
    public function information(Request $request): View|Factory|Application
    {   
        $prefectures = config('prefecture');
        return view('web.register.user')
            ->with([
                'prefectures' => $prefectures
            ]);
    }
    
    /**
     * @param StoreInformationRequest $request
     */
    public function storeInformation(StoreInformationRequest $request)
    {   
        $session = Session::get('session_account');
        $params = $request->all();

        DB::transaction(function () use ($session, $params) {
            $user = User::create([
                'email' => $session['email'],
                'password' => Hash::make($session['password']),
                'last_name' => $params['last_name'],
                'first_name' => $params['first_name'],
                'last_name_kana' => $params['last_name_kana'],
                'first_name_kana' => $params['first_name_kana'],
                'zip_code' => $params['zip_code'],
                'prefecture' => $params['prefecture'],
                'address_city' => $params['address_city'],
                'address_block' => $params['address_block'],
                'address_building' => $params['address_building'],
                'tel' => $params['tel']
            ]);
        });

        return view('web.register.product');
    }

    public function product()
    {
        return view('web.register.product');
    }

    public function confirm()
    {
        return view('web.register.confirm');
    }

    public function complete()
    {
        return view('web.register.complete');
    }
}
