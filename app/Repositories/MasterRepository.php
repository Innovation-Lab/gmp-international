<?php

namespace App\Repositories;

use App\Models\MBrand;
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
        // TODO: Implement UpdateOrCreate_color() method.
    }
    
    public function UpdateOrCreate_product(Request $request)
    {
        // TODO: Implement UpdateOrCreate_product() method.
    }
    
    public function UpdateOrCreate_shop(Request $request)
    {
        // TODO: Implement UpdateOrCreate_shop() method.
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
}