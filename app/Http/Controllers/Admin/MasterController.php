<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBrandRequest;
use App\Http\Requests\StoreColorRequest;
use App\Http\Requests\StoreShopRequest;
use App\Models\Admin;
use App\Models\MBrand;
use App\Models\MColor;
use App\Models\MShop;
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
     * @param StoreBrandRequest $request
     * @return RedirectResponse
     */
    public function brandUpdateOrCreate(StoreBrandRequest $request): RedirectResponse
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
    
    /**
     * @param Request $request
     * @return View|Factory|Application
     */
    public function store(Request $request): View|Factory|Application
    {
        return view('admin.masters.store.index', [
            'shops' => MShop::query()->paginate(20)
        ]);
    }
    
    /**
     * @param MShop $shop
     * @return View|Factory|Application
     */
    public function storeDetail(MShop $shop): View|Factory|Application
    {
        return view('admin.masters.store.detail.index', [
            'shop' => $shop
        ]);
    }
    
    /**
     * @param MShop $shop
     * @return View|Factory|Application
     */
    public function storeEdit(MShop $shop): View|Factory|Application
    {
        return view('admin.masters.store.edit.index', [
            'shop' => $shop,
            'prefectures' => config('prefecture')
        ]);
    }
    public function storeCreate(Request $request): View|Factory|Application
    {
        return view('admin.masters.store.edit.index', [
            'shop' => new MShop(),
            'prefectures' => config('prefecture')
        ]);
    }
    
    /**
     * @param StoreShopRequest $request
     * @return RedirectResponse
     */
    public function storeUpdateOrCreate(StoreShopRequest $request): RedirectResponse
    {
        DB::beginTransaction();
        try {
            $this->masterRepository->updateOrCreate_shop($request);
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()
                ->with(['error' => 'エラーが発生しました。']);
        }
        DB::commit();
        
        return redirect()->route('admin.masters.store')
            ->with(['success' => '登録しました。']);
    }
    
    
    /**
     * @param Request $request
     * @return View|Factory|Application
     */
    public function color(Request $request): View|Factory|Application
    {
        return view('admin.masters.color.index', [
            'colors' => MColor::query()->paginate(20)
        ]);
    }
    public function colorEdit(MColor $color): View|Factory|Application
    {
        return view('admin.masters.color.edit.index', [
            'color' => $color
        ]);
    }
    public function colorCreate(Request $request): View|Factory|Application
    {
        return view('admin.masters.color.edit.index', [
            'color' => new MColor()
        ]);
    }
    
    /**
     * @param StoreColorRequest $request
     * @return RedirectResponse
     */
    public function colorUpdateOrCreate(StoreColorRequest $request): RedirectResponse
    {
        DB::beginTransaction();
        try {
            $this->masterRepository->updateOrCreate_color($request);
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()
                ->with(['error' => 'エラーが発生しました。']);
        }
        DB::commit();
        
        return redirect()->route('admin.masters.color')
            ->with(['success' => '登録しました。']);
    }

}
