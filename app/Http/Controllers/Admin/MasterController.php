<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class MasterController extends Controller
{
    /**
     * @param Request $request
     * @return View|Factory|Application
     */
    //ブランドマスタ
    public function brand(Request $request): View|Factory|Application
    {
        return view('admin.masters.brand.index', [
        ]);
    }
    public function brandEdit(Request $request): View|Factory|Application
    {
        return view('admin.masters.brand.edit.index', [
        ]);
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

    //店舗マスタ
    public function store(Request $request): View|Factory|Application
    {
        return view('admin.masters.store.index', [
        ]);
    }
    public function storeEdit(Request $request): View|Factory|Application
    {
        return view('admin.masters.store.edit.index', [
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
}
