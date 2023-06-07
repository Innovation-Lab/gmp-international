<?php

namespace App\Repositories;

use App\Models\MBrand;
use App\Models\MColor;
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
        // TODO: Implement UpdateOrCreate_product() method.
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
            'image_path' => '',
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
            'image_path' => '',
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
                'image_path' => NULL,
            ],
            default => [
                'name' => $request->input('name'),
                'alphabet_name' => $request->input('alphabet_name'),
                'color' => $request->input('color'),
                'second_color' => $request->input('second_color'),
                'image_path' => NULL,
            ],
        };
    }
}