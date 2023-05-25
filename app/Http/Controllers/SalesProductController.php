<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\MBrand;
use App\Models\MColor;
use App\Models\MProduct;
use App\Models\MShop;
use App\Models\SalesProduct;
use Illuminate\Http\Request;
use App\Http\Requests\StoreProductRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;

class SalesProductController extends Controller
{
    /**
     * 製品の追加登録 入力画面
     * @return View
     */
    public function product(): View
    {
        return view('web.mypage.product.add')->with([
            'brands' => MBrand::query()->pluck('name', 'id')->toArray(),
            'products' => MProduct::query()->pluck('name', 'id')->toArray(),
            'colors' => MColor::query()->pluck('alphabet_name', 'id')->toArray(),
            'shops' => MShop::query()->pluck('name', 'id')->toArray(),
        ]);
    }
    
    /**
     * @param StoreProductRequest $request
     * @return RedirectResponse
     */
    public function productAdd(StoreProductRequest $request): RedirectResponse
    {
        $params = $request->all();
        Session::put('product', $params);
        
        return redirect()->route('mypage.confirm');
    }
    
    /**
     * 製品の追加登録 確認画面
     * @return View
     */
    public function productConfirm(): View
    {
        $product = Session::get('product');
        
        return view('web.mypage.product.confirm')->with([
            'product' => $product,
            'brands' => MBrand::query()->pluck('name', 'id')->toArray(),
            'products' => MProduct::query()->pluck('name', 'id')->toArray(),
            'colors' => MColor::query()->pluck('alphabet_name', 'id')->toArray(),
            'shops' => MShop::query()->pluck('name', 'id')->toArray(),
        ]);
    }

    /**
     * 製品の追加登録 保存
     */
    public function store(Request $request)
    {
        $product = Session::get('product');

        try {
            SalesProduct::create([
                'm_product_id' => data_get($product, 'm_product_id'),
                'user_id' => \Auth::user()->id,
                'purchase_date' => data_get($product, 'purchase_date'),
                'm_shop_id' => data_get($product, 'm_shop_id') && data_get($product, 'm_shop_id') != 'other' ? data_get($product, 'm_shop_id') : NULL,
                'product_code' => data_get($product, 'product_code'),
                'm_color_id' => data_get($product, 'm_color_id') && data_get($product, 'm_color_id') != 'other' ? data_get($product, 'm_color_id') : NULL,
                'other_color_name' => data_get($product, 'other_color_name'),
                'other_shop_name' => data_get($product, 'other_shop_name'),
            ]);

            \DB::commit();
            Session::forget('product');

            return redirect()
                ->route('mypage.index')
                ->with('message', '登録が完了しました。');

        } catch (\Exception $e) {
            \DB::rollBack();
        }

        \Session::forget('product');

        return redirect()
            ->back()
            ->with('error', 'エラーが発生しました。');
    }
}
