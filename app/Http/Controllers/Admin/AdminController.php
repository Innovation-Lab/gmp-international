<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAdminAccountRequest;
use App\Models\MShop;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Http\Requests\UpdateAdminRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    /**
     * @param Request $request
     * @return Application|Factory|View
     */
    public function index(Request $request): View|Factory|Application
    {
        return view('admin.staffs.index', [
            'admins' => Admin::query()->paginate(50)
        ]);
    }
    
    /**
     * @return View
     */
    public function create(): View
    {
        return view('admin.staffs.edit.index', [
            'admin' => new Admin(),
            'shops' => MShop::query()->pluck('name', 'id')->toArray(),
        ]);
    }
    
    /**
     * @param Admin $admin
     * @return View
     */
    public function edit(Admin $admin): View
    {
        return view('admin.staffs.edit.index', [
            'admin' => $admin,
            'shops' => MShop::query()->pluck('name', 'id')->toArray(),
        ]);
    }
    
    /**
     * @param StoreAdminAccountRequest $request
     * @return RedirectResponse
     */
    public function updateOrCreate(StoreAdminAccountRequest $request): RedirectResponse
    {
        DB::beginTransaction();
        try {
            $params = $this->arrayShapeAdmin($request);
            
            // 画像の登録
            if ($request->file('image_path')) {
                $file = $request->file('image_path');
                $path = Storage::disk('s3')->put('admin', $file);
                $params['image_path'] = $path;
            }
            
            Admin::updateOrCreate(['id'=> $request->input('id')], $params);
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()
                ->with(['alert' => 'エラーが発生しました。']);
        }
        DB::commit();
        
        return redirect()->route('admin.staffs.index')
            ->with(['success' => '登録しました。']);
    }
    
    public function delete(Admin $admin)
    {
        DB::beginTransaction();
        try {
            $admin->email = $admin->email . '@' . date('YmdHis');
            $admin->save();
            $admin->delete();
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()
                ->with(['alert' => 'エラーが発生しました。']);
        }
        DB::commit();
        
        return redirect()->route('admin.staffs.index')
            ->with(['success' => '削除しました。']);
    }
    
    /**
     * @param Request $request
     * @return array
     */
    private function arrayShapeAdmin(Request $request): array
    {
        if ($request->input('password')) {
            $array = [
                'authority' => $request->input('authority'),
                'last_name' => $request->input('last_name'),
                'first_name' => $request->input('first_name'),
                'last_name_kana' => $request->input('last_name_kana'),
                'first_name_kana' => $request->input('first_name_kana'),
                'm_shop_id' => $request->input('m_shop_id'),
                'email' => $request->input('email'),
                'password' => Hash::make($request->input('password'))
            ];
        } else {
            $array = [
                'authority' => $request->input('authority'),
                'last_name' => $request->input('last_name'),
                'first_name' => $request->input('first_name'),
                'last_name_kana' => $request->input('last_name_kana'),
                'first_name_kana' => $request->input('first_name_kana'),
                'm_shop_id' => $request->input('m_shop_id'),
                'email' => $request->input('email'),
            ];
        }
        
        return $array;
    }
}
