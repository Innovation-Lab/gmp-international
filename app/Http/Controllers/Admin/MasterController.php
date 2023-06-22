<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBrandRequest;
use App\Http\Requests\StoreColorRequest;
use App\Http\Requests\StoreMProductRequest;
use App\Http\Requests\StoreShopRequest;
use App\Models\Admin;
use App\Models\ColorUrl;
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
        $preview = Session::get('preview');
        return view('admin.masters.product.detail.index', [
            'product' => $product,
            'preview' => $preview
        ]);
    }
    
    /**
     * @param MProduct $product
     * @return View|Factory|Application
     */
    public function productEdit(MProduct $product): View|Factory|Application
    {
        $preview = Session::get('preview');
        $fix_product = Session::get('product', []);
        
        $colors = MColor::withTrashed()
            ->select(['id', 'alphabet_name', 'name'])
            ->get()
            ->mapWithKeys(function ($color) {
                return [$color->id => $color->alphabet_name.' / '.$color->name];
            })
            ->toArray();
        
        
        if (count($fix_product) > 0) {
            Session::forget('product');
            
            return view('admin.masters.product.edit._fix', [
                'product' => $product,
                'fix_product' => $fix_product,
                'brands' => MBrand::query()->pluck('name', 'id')->toArray(),
                'colors' => $colors,
            ]);
        }
        
        return view('admin.masters.product.edit.index', [
            'product' => $product,
            'brands' => MBrand::query()->pluck('name', 'id')->toArray(),
            'colors' => $colors,
            'preview' => $preview
        ]);
    }
    
    public function productCreate(Request $request): View|Factory|Application
    {
        $preview = Session::get('preview');
        $fix_product = Session::get('product', []);
 
        if (count($fix_product) > 0) {
            Session::forget('product');
            
            return view('admin.masters.product.edit._fix', [
                'product' => new MProduct(),
                'fix_product' => $fix_product,
                'brands' => MBrand::query()->pluck('name', 'id')->toArray(),
                'colors' => MColor::withTrashed()->pluck('alphabet_name', 'id')->toArray(),
            ]);
        }
        
        return view('admin.masters.product.edit.index', [
            'product' => new MProduct(),
            'brands' => MBrand::query()->pluck('name', 'id')->toArray(),
            'colors' => MColor::withTrashed()->pluck('alphabet_name', 'id')->toArray(),
            'preview' => $preview
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
        
        Session::forget('product');
        $preview = Session::get('preview');
        
        if ($preview) {
            return redirect()->to($preview)
                ->with(['success' => '登録しました。']);
        }
        
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
        
        $search_int = 0;
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
            $search_int++;
        }
        
        if ($request->get('m_brand_id') && count($request->get('m_brand_id')) > 0) {
            $query->whereIn('m_products.m_brand_id', $request->get('m_brand_id'));
            $search_int++;
        }
        
        if ($request->get('m_color_id') && count($request->get('m_color_id')) > 0) {
            foreach ($request->get('m_color_id') as $color) {
                $query->whereRaw("FIND_IN_SET('{$color}', m_products.color_array)");
            }
            $search_int++;
        }
        
        if($search_int > 0) {
            Session::put('preview', url()->full());
        } else {
            Session::forget('preview');
        }

        return $query;
    }
    
    /**
     * @param Request $request
     * @return Builder
     */
    private function searchColor(Request $request): Builder
    {
        $query = Mcolor::query();
        
        $search_int = 0;
        if ($request->get('keyword')) {
            $half_space_string = mb_convert_kana($request->get('keyword'), 's');
            $search_array = explode(' ', $half_space_string);
            
            $query->where(function ($_query) use ($search_array) {
                foreach ($search_array as $search_word) {
                    $_query->where(function ($sub_query) use ($search_word) {
                        $sub_query->where('m_colors.name', 'LIKE', '%' . $search_word . '%')
                            ->orWhere('m_colors.alphabet_name', 'LIKE', '%' . $search_word . '%')
                            ->orWhere('m_colors.color', 'LIKE', '%' . $search_word . '%')
                            ->orWhere('m_colors.second_color', 'LIKE', '%' . $search_word . '%');
                    });
                }
            });
            $search_int++;
        }
        
        if ($request->get('m_color_id') && count($request->get('m_color_id')) > 0) {
            $query->whereIn('id', $request->get('m_color_id'));
            $search_int++;
        }
        
        if($search_int > 0) {
            Session::put('preview', url()->full());
        } else {
            Session::forget('preview');
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
        $select_colors = MColor::query()
            ->select(['id', 'alphabet_name', 'name'])
            ->get()
            ->mapWithKeys(function ($color) {
                return [$color->id => $color->alphabet_name.' / '.$color->name];
            })
            ->toArray();
        
        return view('admin.masters.color.index', [
            'colors' => $this->searchColor($request)->paginate(20),
            'select_colors' => $select_colors
        ]);
    }
    public function colorEdit(MColor $color): View|Factory|Application
    {
        $preview = Session::get('preview');
        return view('admin.masters.color.edit.index', [
            'color' => $color,
            'preview' => $preview
        ]);
    }
    public function colorCreate(Request $request): View|Factory|Application
    {
        $preview = Session::get('preview');
        return view('admin.masters.color.edit.index', [
            'color' => new MColor(),
            'preview' => $preview
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
        
        $preview = Session::get('preview');
        
        if ($preview) {
            return redirect()->to($preview)
                ->with(['success' => '登録しました。']);
        }
        
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
            ColorUrl::where('m_product_id', $product->id)->delete();
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
