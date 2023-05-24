<?php

namespace App\Repositories;

use App\Models\SalesProduct;
use App\Models\User;
use App\Repositories\UserRepositoryInterface;
use App\Services\SendMailService;
use Illuminate\Http\Request;
use App\Http\Requests\StoreAccountRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserRepository implements UserRepositoryInterface
{
    private SendMailService $sendMailService;
    
    /**
     * @param SendMailService $sendMailService
     */
    public function __construct(
        SendMailService $sendMailService
    ) {
        $this->sendMailService = $sendMailService;
    }
    
    public function search(Request $request)
    {

    }

    public function store(User $user, Request $request)
    {

    }

    public function accountUpdate(User $user, Request $request)
    {
        DB::beginTransaction();
        try {
            $data = $request->all();
            $data['password'] = Hash::make($data['password']);
            unset($data['password_confirmation']);
            unset($data['_token']);
            $user->fill($data)->save();
            
            DB::commit();
            return true;
        } catch(\Exception $e) {
            DB::rollback();
        }


        return false;
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
     * @param array $users
     * @param array $products
     * @return bool
     */
    public function createWithProduct(
        array $users,
        array $products
    ): bool
    {
        
        DB::beginTransaction();
        try {
            $user = User::create([
                'email' => data_get($users, 'email'),
                'password' => \Illuminate\Support\Facades\Hash::make(data_get($users, 'password')),
                'last_name' => data_get($users, 'last_name'),
                'first_name' => data_get($users, 'first_name'),
                'last_name_kana' => data_get($users, 'last_name_kana'),
                'first_name_kana' => data_get($users, 'first_name_kana'),
                'zip_code' => data_get($users, 'zip_code'),
                'prefecture' => data_get($users, 'prefecture'),
                'address_city' => data_get($users, 'address_city'),
                'address_block' => data_get($users, 'address_block'),
                'address_building' => data_get($users, 'address_building'),
                'tel' => data_get($users, 'tel'),
                'is_catalog' => data_get($users, 'is_catalog'),
                'is_dm' => data_get($users, 'is_dm')
            ]);
            
            foreach ($products as $product) {
                
                SalesProduct::create([
                    'm_product_id' => data_get($product, 'm_product_id'),
                    'user_id' => data_get($user, 'id'),
                    'purchase_date' => data_get($product, 'purchase_date'),
                    'm_shop_id' => data_get($product, 'm_shop_id') && data_get($product, 'm_shop_id') != '9999999' ? data_get($product, 'm_shop_id') : NULL,
                    'product_code' => data_get($product, 'product_code'),
                    'm_color_id' => data_get($product, 'm_color_id') && data_get($product, 'm_color_id') != '9999999' ? data_get($product, 'm_color_id') : NULL,
                    'other_color_name' => data_get($product, 'other_color_name'),
                    'other_shop_name' => data_get($product, 'other_shop_name'),
                ]);
            }
            
            // メールの送信
            $this->sendMailService->send('registration', $users, 1);
            
            DB::commit();
            Auth::loginUsingId($user->id);
            
            return true;
        } catch (\Exception $e) {
            DB::rollBack();
        }
        
        return false;
    }
}
