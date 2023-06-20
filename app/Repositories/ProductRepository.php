<?php

namespace App\Repositories;

use App\Models\MBrand;
use App\Models\MColor;
use App\Models\MProduct;
use App\Models\MShop;
use App\Models\SalesProduct;
use App\Models\User;
use App\Repositories\ProductRepositoryInterface;
use App\Services\SendMailService;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Hash;


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

            if ($data['m_color_id'] == 'other') {
                $data['m_color_id'] = NULL;
            }
            if ($data['m_shop_id'] == 'other') {
                $data['m_shop_id'] = NULL;
            }

            if ($data['m_color_id'] != 'other') {
                $data['other_color_name'] = NULL;
            }
            if ($data['m_shop_id'] != 'other') {
                $data['other_shop_name'] = NULL;
            }

            $product->fill($data)->save();

            \DB::commit();
            return true;

        } catch(\Exception $e) {
            \DB::rollback();
        }

        return false;
    }
    
    /**
     * @param $product
     * @param Request $request
     * @return mixed
     */
    public function destroy($product, Request $request): mixed
    {
        return \DB::transaction(function () use ($product) {
            $product->delete();
        });
    }
    
    /**
     * @param array $csv
     * @return Collection
     */
    public function import(array $csv): Collection
    {
        $chunkSize = 30;
        $productCsvHeader = Config::get('import_mapping_const.sales_product_csv_header');
        
        return collect($csv)->chunk($chunkSize)->each(function ($chunk) use ($productCsvHeader) {
            $productToCreate = [];
            
            foreach ($chunk as $item) {
                $params = [];
                $new_params = [];
  
                foreach ($item as $key => $value) {
                    $value = trim($value);

                    switch ($productCsvHeader[$key]) {
                        case 'user_id':
                            $user = User::where('old_id', $value)->first();
                            if($user) {
                                $new_params['user_id'] = $user->id;
                            } else {
                                continue 2;
                            }
                            break;
                        case 'brand_name':
                            if ($value) {
                                $mBrand = MBrand::whereRaw('LOWER(name) LIKE ?', ['%' . strtolower($value) . '%'])->first();
                            }
                            break;
                        case 'product_name':
                            if ($value) {
                                $mProduct = MProduct::whereRaw('LOWER(name) LIKE ?', ['%' . strtolower($value) . '%'])->first();
                                if($mProduct) {
                                    $new_params['m_product_id'] = $mProduct->id;
                                }
                            }
                            break;
                        case 'color_name':
                            if ($value) {
                                $mColor = MColor::whereRaw('LOWER(name) LIKE ?', ['%' . strtolower($value) . '%'])->first();
                                if($mColor) {
                                    $new_params['m_color_id'] = $mColor->id;
                                } else {
                                    $new_params['other_color_name'] = $value;
                                }
                            }
                            break;
                        case 'store_name':
                            if ($value) {
                                $mShop = MShop::whereRaw('LOWER(name) LIKE ?', ['%' . strtolower($value) . '%'])->first();
                                if($mShop) {
                                    $new_params['shop_id'] = $mShop->id;
                                } else {
                                    $new_params['other_shop_name'] = $value;
                                }
                            }
                            break;
                        case 'purchase_date':
                            if ($value) {
                                $new_params['purchase_date'] = date('Y-m-d', strtotime($value));
                            }
                            break;
                        case 'product_code':
                            if ($value) {
                                $new_params['product_code'] = $value;
                            }
                            break;
                        case 'product_code_spare':
                            if ($value && !isset($new_params['product_code'])) {
                                $new_params['product_code'] = $value;
                            }
                            break;
                    }
                }
                if (isset($new_params['m_product_id']) && isset($new_params['user_id'])) {
                    $productToCreate[] = $new_params;
                }
            }

            SalesProduct::insert($productToCreate);
        });
    }
}
