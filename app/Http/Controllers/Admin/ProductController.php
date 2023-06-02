<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MProduct;
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
    public function index(Request $request): View|Factory|Application
    {
        return view('admin.products.index', [
            'products' => []
        ]);
    }

    public function detail(): View
    {
        return view('admin.products.detail.index');
    }

    public function edit(): View
    {
        return view('admin.products.detail.edit.index');
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
