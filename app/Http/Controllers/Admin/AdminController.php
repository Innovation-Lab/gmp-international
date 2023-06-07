<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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

class AdminController extends Controller
{
    /**
     * @param Request $request
     * @return Application|Factory|View
     */
    public function index(Request $request): View|Factory|Application
    {
        return view('admin.staffs.index', [
            'admins' => Admin::query()->paginate(20)
        ]);
    }
    
    /**
     * @return View
     */
    public function create(): View
    {
        return view('admin.staffs.create.index');
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
     * @param Admin $admin
     * @param Request $request
     * @return RedirectResponse
     */
    public function updateOrCreate(Admin $admin, Request $request): RedirectResponse
    {
        DB::beginTransaction();
        try {
        
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()
                ->with(['error' => 'エラーが発生しました。']);
        }
        DB::commit();
        
        return redirect()->route('admin.staff.index')
            ->with(['success' => '登録しました。']);
    }
    
    public function delete(Admin $admin)
    {
    
    }
}
