<?php

namespace App\Repositories;

use App\Models\ColorUrl;
use App\Models\MBrand;
use App\Models\MColor;
use App\Models\MProduct;
use App\Models\MShop;
use App\Repositories\MasterRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class MasterRepository implements MasterRepositoryInterface
{
    /**
     * @param Request $request
     * @return mixed
     */
    public function UpdateOrCreate_brand(Request $request): mixed
    {
        $params = $this->arrayShapeBrand($request);
        
        // 画像の登録
        if ($request->file('image_path')) {
            $file = $request->file('image_path');
            $path = Storage::disk('s3')->put('brands', $file);
            $params['image_path'] = $path;
        }
        
        return MBrand::updateOrCreate(['id'=> $request->input('id')], $params);
    }
    
    public function UpdateOrCreate_color(Request $request)
    {
        $params = $this->arrayShapeColor($request);
        
        // 画像の登録
        if ($request->file('image_path')) {
            $file = $request->file('image_path');
            $path = Storage::disk('s3')->put('colors', $file);
            $params['image_path'] = $path;
        }

        return MColor::updateOrCreate(['id'=> $request->input('id')], $params);
    }
    
    public function UpdateOrCreate_product(Request $request)
    {
        return DB::transaction(function() use($request){
            $params = $this->arrayShapeProduct($request);
            
            if($product = MProduct::updateOrCreate(['id'=> $request->input('id')], $params['product'])) {
        
                if (count($params['color_url']) > 0) {
                    foreach ($params['color_url'] as $color) {
                        $color['m_product_id'] = $product->id;
                        ColorUrl::updateOrCreate(['id'=> data_get($color, 'id')], $color);
                    }
                }
            }
        });
    }
    
    /**
     * @param Request $request
     * @return mixed
     */
    public function UpdateOrCreate_shop(Request $request): mixed
    {
        $params = $this->arrayShapeShop($request);
   
        // 画像の登録
        if ($request->file('image_path')) {
            $file = $request->file('image_path');
            $path = Storage::disk('s3')->put('shops', $file);
            $params['image_path'] = $path;
        }
        
        return MShop::updateOrCreate(['id'=> $request->input('id')], $params);
    }
    
    
    /**
     * @param Request $request
     * @return array
     */
    private function arrayShapeBrand(Request $request): array
    {
        return [
            'name' => $request->input('name')
        ];
    }
    
    /**
     * @param Request $request
     * @return array
     */
    private function arrayShapeShop(Request $request): array
    {
        $week_business_hour = $request->get('open_time_of_week'). '〜' .$request->get('close_time_of_week');
        $holiday_business_hour = $request->get('open_time_of_holiday'). '〜' .$request->get('close_time_of_holiday');

        return [
            'name' => $request->input('name'),
            'tel' => $request->input('tel'),
            'zip_code' => $request->input('zip_code'),
            'prefecture' => $request->input('prefecture'),
            'address_city_block' => $request->input('address_city_block'),
            'address_building' => $request->input('address_building'),
            'week_business_hour' => $week_business_hour != '〜' ? $week_business_hour : NULL,
            'week_business_hour_memo' => $request->input('week_business_hour_memo'),
            'holiday_business_hour' => $holiday_business_hour != '〜' ? $holiday_business_hour : NULL,
            'holiday_business_hour_memo' => $request->input('holiday_business_hour_memo'),
        ];
    }
    
    /**
     * @param Request $request
     * @return array
     */
    private function arrayShapeColor(Request $request): array
    {
        return match ($request->input('colorSet_type')) {
            'single' => [
                'name' => $request->input('name'),
                'alphabet_name' => $request->input('alphabet_name'),
                'color' => $request->input('color'),
                'second_color' => NULL,
            ],
            default => [
                'name' => $request->input('name'),
                'alphabet_name' => $request->input('alphabet_name'),
                'color' => $request->input('color'),
                'second_color' => $request->input('second_color'),
            ],
        };
    }
    
    /**
     * @param Request $request
     * @return array
     */
    private function arrayShapeProduct(Request $request): array
    {
        $params = [
            'product' => [
                'm_brand_id' => $request->input('m_brand_id'),
                'name' => $request->input('name'),
                'name_kana' => $request->input('name_kana'),
            ],
            'color_url' => []
        ];
        $color_array = [];
        if(isset($request->get('color')['edit'])) {
            foreach($request->get('color')['edit'] as $key => $value) {
                if (isset($value['m_color_id']) && !in_array($value['m_color_id'], $color_array)) {
                    $color_array[] = $value['m_color_id'];
                    $params['color_url'][$key]['m_color_id'] = $value['m_color_id'];
                }
                if (isset($value['url'])) {
                    $params['color_url'][$key]['url'] = $value['url'];
                }
            }
        }

        if(isset($request->get('color')['add'])) {
            foreach($request->get('color')['add'] as $key => $value) {
                if (isset($value['m_color_id']) && !in_array($value['m_color_id'], $color_array)) {
                    $color_array[] = $value['m_color_id'];
                    $params['color_url'][$key]['m_color_id'] = $value['m_color_id'];
                }
                if (isset($value['url'])) {
                    $params['color_url'][$key]['url'] = $value['url'];
                }
            }
        }
        
        $result = implode(",", $color_array);
        $params['product']['color_array'] = $result;
        
        return $params;
    }
}