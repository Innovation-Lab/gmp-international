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
    /**
     * @return Application|Factory|View
     */
    public function login(): View|Factory|Application
    {
        return view('web.auth.login');
    }
    
    /**
     * @return Application|Factory|View
     */
    public function terms(): View|Factory|Application
    {
        return view('web.register.terms');
    }
    
    /**
     * @return Application|Factory|View
     */
    public function account(): View|Factory|Application
    {
        $user = Session::get('user_info', []);

        return view('web.register.account', [
            'user' => $user
        ]);
    }
    
    /**
     * @param StoreAccountRequest $request
     * @return RedirectResponse
     */
    public function storeAccount(StoreAccountRequest $request): RedirectResponse
    {
        $skip = $request->input('is_skip', 0);
        
        Session::put('user_info', [
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ]);
        
        return match ($skip) {
            0 => redirect()->route('register.info'),
            1 => redirect()->route('register.product'),
        };
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
        return view('web.register.user',[
                'prefectures' => config('prefecture')
            ]);
    }
    
    /**
     * @param StoreInformationRequest $request
     * @return Application|Factory|View
     */
    public function storeInformation(StoreInformationRequest $request)
    {
        $params = $request->all();
        
        session()->push('user_info', [
            'last_name' => $params['last_name'],
            'first_name' => $params['first_name'],
            'last_name_kana' => $params['last_name_kana'],
            'first_name_kana' => $params['first_name_kana'],
            'zip_code' => $params['zip_code'],
            'prefecture' => $params['prefecture'],
            'address_city' => $params['address_city'],
            'address_block' => $params['address_block'],
            'address_building' => $params['address_building'],
            'tel' => $params['tel'],
            'is_catalog' => $params['is_catalog'],
            'is_dm' => $params['is_dm'],
        ]);
        dd(Session::get('user_info'));

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
                'tel' => $params['tel'],
                'is_catalog' => $params['is_catalog'],
                'is_dm' => $params['is_dm'],
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
