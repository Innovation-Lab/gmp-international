<?php

namespace App\Repositories;

use Illuminate\Http\Request;

interface ProductRepositoryInterface
{
    public function search(Request $request);
    public function store($sales_product, Request $request);
    public function update($product, Request $request);
}
