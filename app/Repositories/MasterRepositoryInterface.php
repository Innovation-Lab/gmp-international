<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Http\StoreAccountRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

interface MasterRepositoryInterface
{
    public function UpdateOrCreate_brand(Request $request);
    public function UpdateOrCreate_shop(Request $request);
    public function UpdateOrCreate_color(Request $request);
    public function UpdateOrCreate_product(Request $request);
    public function deleteColor(Request $request);
    public function importShop(array $csv);
    public function importColor(array $csv);
    public function importProduct(array $csv);
    public function importBrand(array $csv);
}
