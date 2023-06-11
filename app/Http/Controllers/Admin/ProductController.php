<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MProduct;
use App\Models\MBrand;
use App\Models\MColor;
use App\Models\MShop;
use App\Models\SalesProduct;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use App\Http\Requests\StoreProductRequest;
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

    public function create(): View
    {
        return view('admin.products.create.products',[
            'brands' => MBrand::query()->pluck('name', 'id')->toArray(),
            'products' => MProduct::query()->pluck('name', 'id')->toArray(),
            'colors' => MColor::query()->pluck('alphabet_name', 'id')->toArray(),
            'shops' => MShop::query()->pluck('name', 'id')->toArray(),
        ]);
    }

    public function store(StoreProductRequest $request)
    {

    }


    public function detail(SalesProduct $product): View
    {
        $user = data_get($product, 'user');

        return view('admin.products.detail.index')->with([
            'product' => $product,
            'user' => $user,
        ]);
    }

    public function edit(): View
    {
        return view('admin.products.edit.index');
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
