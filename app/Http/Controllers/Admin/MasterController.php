<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\MBrand;
use App\Repositories\MasterRepositoryInterface;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MasterController extends Controller
{
    private MasterRepositoryInterface $masterRepository;
    
    /**
     * @param MasterRepositoryInterface $masterRepository
     */
    public function __construct(
        MasterRepositoryInterface $masterRepository
    ) {
        $this->masterRepository = $masterRepository;
    }
    /**
     * @param Request $request
     * @return View|Factory|Application
     */
    public function brand(Request $request): View|Factory|Application
    {
        return view('admin.masters.brand.index', [
            'brands' => MBrand::query()->paginate(20)
        ]);
    }
    
    /**
     * @param Request $request
     * @return View|Factory|Application
     */
    public function brandCreate(Request $request): View|Factory|Application
    {
        return view('admin.masters.brand.edit.index', [
            'brand' => new MBrand()
        ]);
    }
    
    /**
     * @param MBrand $brand
     * @return View|Factory|Application
     */
    public function brandEdit(MBrand $brand): View|Factory|Application
    {
        return view('admin.masters.brand.edit.index', [
            'brand' => $brand
        ]);
    }
    
    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function brandUpdateOrCreate(Request $request): RedirectResponse
    {
        DB::beginTransaction();
        try {
            $this->masterRepository->updateOrCreate_brand($request);
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()
                ->with(['error' => 'エラーが発生しました。']);
        }
        DB::commit();
        
        return redirect()->route('admin.masters.brand')
            ->with(['success' => '登録しました。']);
    }

    //製品マスタ
    public function product(Request $request): View|Factory|Application
    {
        return view('admin.masters.product.index', [
        ]);
    }
    public function productEdit(Request $request): View|Factory|Application
    {
        return view('admin.masters.product.edit.index', [
        ]);
    }
    public function productDetail(Request $request): View|Factory|Application
    {
        return view('admin.masters.product.detail.index', [
        ]);
    }
    public function productCreate(Request $request): View|Factory|Application
    {
        return view('admin.masters.product.create.index', [
        ]);
    }

    //店舗マスタ
    public function store(Request $request): View|Factory|Application
    {
        return view('admin.masters.store.index', [
        ]);
    }
    public function storeDetail(Request $request): View|Factory|Application
    {
        return view('admin.masters.store.detail.index', [
        ]);
    }
    public function storeEdit(Request $request): View|Factory|Application
    {
        return view('admin.masters.store.edit.index', [
        ]);
    }
    public function storeCreate(Request $request): View|Factory|Application
    {
        return view('admin.masters.store.create.index', [
        ]);
    }
    

    //カラーマスタ
    public function color(Request $request): View|Factory|Application
    {
        return view('admin.masters.color.index', [
        ]);
    }
    public function colorEdit(Request $request): View|Factory|Application
    {
        return view('admin.masters.color.edit.index', [
        ]);
    }
    public function colorCreate(Request $request): View|Factory|Application
    {
        return view('admin.masters.color.create.index', [
        ]);
    }

}
