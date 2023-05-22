<?php

namespace App\Http\Controllers;

use App\Repositories\UserRepositoryInterface;
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
    private UserRepositoryInterface $userRepository;
    
    /**
     * @param UserRepositoryInterface $userRepository
     */
    public function __construct(
        UserRepositoryInterface $userRepository
    ) {
        $this->userRepository = $userRepository;
    }
    
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
     * @return RedirectResponse
     */
    public function storeInformation(StoreInformationRequest $request): RedirectResponse
    {
        $skip = $request->input('is_skip', 0);
        $params = $request->all();
        $account = Session::get('user_info', []);
        
        session()->put('user_info', [
            'email' => data_get($account, 'email'),
            'password' => data_get($account, 'password'),
            'last_name' => data_get($params, 'last_name'),
            'first_name' => data_get($params, 'first_name'),
            'last_name_kana' => data_get($params, 'last_name_kana'),
            'first_name_kana' => data_get($params, 'first_name_kana'),
            'zip_code' => data_get($params, 'zip_code'),
            'prefecture' => data_get($params, 'prefecture'),
            'address_city' => data_get($params, 'address_city'),
            'address_block' => data_get($params, 'address_block'),
            'address_building' => data_get($params, 'address_building'),
            'tel' => data_get($params, 'tel'),
            'is_catalog' => data_get($params, 'is_catalog'),
            'is_dm' => data_get($params, 'is_dm')
        ]);
        
        return match ($skip) {
            0 => redirect()->route('register.product'),
            1 => redirect()->route('register.confirm'),
        };
    }
    
    /**
     * @return Application|Factory|View
     */
    public function product(): View|Factory|Application
    {
        return view('web.register.product');
    }
    
    /**
     * @return Application|Factory|View
     */
    public function confirm(): View|Factory|Application
    {
        return view('web.register.confirm', [
            'user' => Session::get('user_info', []),
            'product' => Session::get('product', [])
        ]);
    }
    
    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function storeVariable(Request $request): RedirectResponse
    {
        $user = Session::get('user_info', []);
        $product = Session::get('product', []);
        
        if (!$this->userRepository->createWithProduct($user, $product)) {
            return redirect()
                ->back()
                ->with(['error' => 'エラーが発生しました。']);
        }
        
        return redirect()->route('register.complete');
    }
    
    /**
     * @return Application|Factory|View
     */
    public function complete(): View|Factory|Application
    {
        return view('web.register.complete');
    }
}
