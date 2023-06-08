<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MProduct;
use App\Models\SalesProduct;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * @param Request $request
     * @return Application|Factory|View
     */

     public function create(): View
    {
        return view('admin.products.create.index');
    }
    public function createProduct(): View
    {
        return view('admin.products.create.products');
    }

    public function index(Request $request): View|Factory|Application
    {
        return view('admin.products.index', [
            'products' => SalesProduct::query()->paginate(20)
        ]);
    }

    public function detail(): View
    {
        return view('admin.products.detail.index');
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
