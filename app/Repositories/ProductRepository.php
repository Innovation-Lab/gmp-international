<?php

namespace App\Repositories;

use App\Models\SalesProduct;
use App\Models\User;
use App\Repositories\ProductRepositoryInterface;
use App\Services\SendMailService;
use Illuminate\Http\Request;


class ProductRepository implements ProductRepositoryInterface
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
    
    /**
     * @param Request $request
     * @return mixed
     * 登録製品の一覧
     */
    public function search(Request $request): mixed
    {
        return SalesProduct::query()
            ->filter($request)
            ->keyword($request)
            ->whereNull('deleted_at');
    }

    /**
     * @param Request $request
     * 登録製品の追加
     */
    public function store($product, Request $request)
    {
        if (data_get($request, 'm_color_id') == 'other') {
            $request['m_color_id'] = NULL;
        }
        if (data_get($request, 'm_shop_id') == 'other') {
            $request['m_shop_id'] = NULL;
        }

        \DB::beginTransaction();
        try {
            $data = $request->all();
        
            $product->fill($data)->save();
            
            \DB::commit();
            return true;
            
        } catch(\Exception $e) {
            \DB::rollback();
        }

        return false;
    }

    /**
     * @param Request $request
     * 登録製品の更新
     */
    public function update($product, Request $request)
    {
        \DB::beginTransaction();
        try {
            $data = $request->all();
            $product->fill($data)->save();

            \DB::commit();
            return true;

        } catch(\Exception $e) {
            \DB::rollback();
        }

        return false;
    }

    /**
     * @param $user
     * @return mixed
     */
    public function destroy($product, Request $request): mixed
    {
        return \DB::transaction(function () use ($product) {
            $product->delete();
        });
    }
}
