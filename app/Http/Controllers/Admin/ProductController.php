<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\MProduct;
use App\Models\MBrand;
use App\Models\MColor;
use App\Models\MShop;
use App\Models\SalesProduct;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\AdminStoreProductRequest;
use App\Repositories\ProductRepositoryInterface;

class ProductController extends Controller
{
    /**
     * @var ProductRepositoryInterface
     */
    private ProductRepositoryInterface $productRepository;

    /**
     * 登録製品一覧
     *
     * @param Request $request
     * @return Application|Factory|View
     */

    /**
     * @param ProductRepositoryInterface $productRepository
     */

     public function __construct(
        ProductRepositoryInterface $productRepository,
    ) {
        $this->productRepository = $productRepository;
    }

    /**
     * 登録製品一覧
     *
     */
    public function index(Request $request): View|Factory|Application
    {
        return view('admin.products.index', [
            'sales_products' => $this->productRepository->search($request)->orderByDesc('id')->paginate(20),
            'brands' => MBrand::query()->pluck('name', 'id')->toArray(),
            'products' => MProduct::query()->pluck('name', 'id')->toArray(),
            'colors' => MColor::query()->pluck('alphabet_name', 'id')->toArray(),
            'shops' => MShop::query()->pluck('name', 'id')->toArray(),
            'request' => $request,
        ]);
    }

    //  public function create(): View
    // {
    //     return view('admin.products.create.index');
    // }

    /**
     * 登録製品の追加
     *
     */
    public function create(): View
    {
        $users = User::query()
            ->select(['id', 'last_name', 'first_name'])
            ->get()
            ->mapWithKeys(function ($user) {
                return [$user->id => $user->select_user];
            })
            ->toArray();

        return view('admin.products.create.products',[
            'brands' => MBrand::query()->pluck('name', 'id')->toArray(),
            'products' => MProduct::query()->pluck('name', 'id')->toArray(),
            'colors' => MColor::query()->pluck('alphabet_name', 'id')->toArray(),
            'shops' => MShop::query()->pluck('name', 'id')->toArray(),
            'users' => $users,
        ]);
    }

    /**
     * 登録製品の保存
     *
     */
    public function store(AdminStoreProductRequest $request)
    {
        $sales_product = new SalesProduct;
        $user = new User;

        if ($this->productRepository->store($sales_product, $request)) {
            return redirect()
                ->route('admin.products.index')
                ->with('status', 'success')
                ->with('success', '登録が完了しました。');
        } else {
            return redirect()
                ->back()
                ->with('status', 'failed')
                ->with('alert', '登録に失敗しました。');
        }
    }

     /**
     * 登録製品の詳細
     *
     */
    public function detail(SalesProduct $product): View
    {
        $user = data_get($product, 'user');

        return view('admin.products.detail.index')->with([
            'product' => $product,
            'user' => $user,
        ]);
    }

     /**
     * 登録製品情報の編集
     *
     */
    public function edit(SalesProduct $product): View
    {
        return view('admin.products.edit.index', $product,[
            'brands' => MBrand::query()->pluck('name', 'id')->toArray(),
            'products' => MProduct::query()->pluck('name', 'id')->toArray(),
            'colors' => MColor::query()->pluck('alphabet_name', 'id')->toArray(),
            'shops' => MShop::query()->pluck('name', 'id')->toArray(),
            'product' => $product,
        ]);
    }

     /**
     * 登録製品情報の更新
     *
     */
    public function update(SalesProduct $product, StoreProductRequest $request)
    {
        if ($this->productRepository->update($product, $request)) {
            return redirect()
                ->route('admin.products.index')
                ->with('status', 'success')
                ->with('success', '登録が完了しました。');
        } else {
            return redirect()
                ->back()
                ->with('status', 'failed')
                ->with('alert', '登録に失敗しました。');
        }
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function destroy(Request $request): RedirectResponse
    {
        $product = SalesProduct::find($request->input('product_id'));
        $this->productRepository->destroy($product, $request);
        return redirect()->route('admin.products.index');
    }
    
    // /**
    //  * @param MProduct $product
    //  * @return Application|Factory|View
    //  */
    // public function detail(MProduct $product): View|Factory|Application
    // {
    //     return view('admin.products.detail', compact('product'));
    // }
}
