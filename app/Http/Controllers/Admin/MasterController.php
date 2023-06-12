<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBrandRequest;
use App\Http\Requests\StoreColorRequest;
use App\Http\Requests\StoreMProductRequest;
use App\Http\Requests\StoreShopRequest;
use App\Models\Admin;
use App\Models\MBrand;
use App\Models\MColor;
use App\Models\MProduct;
use App\Models\MShop;
use App\Repositories\MasterRepositoryInterface;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

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
                ->with(['alert' => 'エラーが発生しました。']);
        }
        DB::commit();
        
        return redirect()->route('admin.masters.brand')
            ->with(['success' => '登録しました。']);
    }
    
    /**
     * @param Request $request
     * @return View|Factory|Application
     */
    public function product(Request $request): View|Factory|Application
    {
        return view('admin.masters.product.index', [
            'products' => $this->searchProduct($request)->paginate(20),
            'brands' => MBrand::query()->pluck('name', 'id')->toArray(),
            'colors' => MColor::query()->pluck('alphabet_name', 'id')->toArray(),
        ]);
    }
    
    /**
     * @param MProduct $product
     * @return View|Factory|Application
     */
    public function productDetail(MProduct $product): View|Factory|Application
    {
        return view('admin.masters.product.detail.index', [
            'product' => $product
        ]);
    }
    
    /**
     * @param MProduct $product
     * @return View|Factory|Application
     */
    public function productEdit(MProduct $product): View|Factory|Application
    {
        $fix_product = Session::get('product', []);
        
        if (count($fix_product) > 0) {
            Session::forget('product');
            
            return view('admin.masters.product.edit._fix', [
                'product' => $product,
                'fix_product' => $fix_product,
                'brands' => MBrand::query()->pluck('name', 'id')->toArray(),
                'colors' => MColor::query()->pluck('alphabet_name', 'id')->toArray(),
            ]);
        }
        
        return view('admin.masters.product.edit.index', [
            'product' => $product,
            'brands' => MBrand::query()->pluck('name', 'id')->toArray(),
            'colors' => MColor::withTrashed()->pluck('alphabet_name', 'id')->toArray(),
        ]);
    }
    
    public function productCreate(Request $request): View|Factory|Application
    {
        return view('admin.masters.product.edit.index', [
            'product' => new MProduct(),
            'brands' => MBrand::query()->pluck('name', 'id')->toArray(),
            'colors' => MColor::query()->pluck('alphabet_name', 'id')->toArray(),
        ]);
    }
    
    /**
     * @param StoreMProductRequest $request
     * @return RedirectResponse
     */
    public function productUpdateOrCreate(StoreMProductRequest $request): RedirectResponse
    {
        DB::beginTransaction();
        try {
            $this->masterRepository->updateOrCreate_product($request);
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()
                ->with(['alert' => 'エラーが発生しました。']);
        }
        DB::commit();
        
        return redirect()->route('admin.masters.product')
            ->with(['success' => '登録しました。']);
    }
    
    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function productColorDelete(Request $request): JsonResponse
    {
        DB::beginTransaction();
        try {
            $this->masterRepository->deleteColor($request);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json($e->getMessage());
        }
        DB::commit();
        
        return response()->json([
            'message' => '削除成功'
        ], 200);
    }
    
    /**
     * @param Request $request
     * @return Builder
     */
    private function searchProduct(Request $request): Builder
    {
        $query = MProduct::query()->select('m_products.*');
        
        if ($request->get('keyword')) {
            $half_space_string = mb_convert_kana($request->get('keyword'), 's');
            $search_array = explode(' ', $half_space_string);
            
            $query->where(function ($_query) use ($search_array) {
                foreach ($search_array as $search_word) {
                    $_query->where(function ($sub_query) use ($search_word) {
                        $sub_query->where('m_products.name', 'LIKE', '%' . $search_word . '%')
                            ->orWhere('m_products.name_kana', 'LIKE', '%' . $search_word . '%');
                    });
                }
            });
        }
        
        if ($request->get('m_brand_id')) {
            $query->where('m_products.m_brand_id', $request->get('m_brand_id'));
        }
        
        if ($request->get('m_color_id')) {
            $query->whereRaw("FIND_IN_SET('{$request->get('m_color_id')}', m_products.color_array)");
        }
        
        return $query;
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
                ->with(['alert' => 'エラーが発生しました。']);
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
                ->with(['alert' => 'エラーが発生しました。']);
        }
        DB::commit();
        
        return redirect()->route('admin.masters.color')
            ->with(['success' => '登録しました。']);
    }
    
    /**
     * @param MBrand $brand
     * @return RedirectResponse
     */
    public function brandDelete(MBrand $brand): RedirectResponse
    {
        DB::beginTransaction();
        try {
            if(count(data_get($brand, 'mProducts')) > 0) {
                return redirect()->back()
                    ->with(['alert' => '製品が紐づいているため削除できません。']);
            }
            $brand->delete();
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()
                ->with(['alert' => 'エラーが発生しました。']);
        }
        DB::commit();
        
        return redirect()->route('admin.masters.brand')
            ->with(['success' => '削除しました。']);
    }
    
    /**
     * @param MProduct $product
     * @return RedirectResponse
     */
    public function productDelete(MProduct $product): RedirectResponse
    {
        DB::beginTransaction();
        try {
            if(count(data_get($product, 'SalesProduct')) > 0) {
                return redirect()->back()
                    ->with(['alert' => 'ユーザー登録済み製品が紐づいているため削除できません。']);
            }
            $product->delete();
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()
                ->with(['alert' => 'エラーが発生しました。']);
        }
        DB::commit();
        
        return redirect()->route('admin.masters.product')
            ->with(['success' => '削除しました。']);
    }
    
    /**
     * @param MShop $shop
     * @return RedirectResponse
     */
    public function storeDelete(Mshop $shop): RedirectResponse
    {
        DB::beginTransaction();
        try {
            if(count(data_get($shop, 'salesProduct')) > 0) {
                return redirect()->back()
                    ->with(['alert' => 'ユーザー登録済み製品が紐づいているため削除できません。']);
            }
            $shop->delete();
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()
                ->with(['alert' => 'エラーが発生しました。']);
        }
        DB::commit();
        
        return redirect()->route('admin.masters.store')
            ->with(['success' => '削除しました。']);
    }
    
    /**
     * @param MColor $color
     * @return RedirectResponse
     */
    public function colorDelete(MColor $color): RedirectResponse
    {
        DB::beginTransaction();
        try {
            $color->delete();
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()
                ->with(['alert' => 'エラーが発生しました。']);
        }
        DB::commit();
        
        return redirect()->route('admin.masters.color')
            ->with(['success' => '削除しました。']);
    }

}
