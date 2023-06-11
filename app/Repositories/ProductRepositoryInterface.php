<?php

namespace App\Repositories;

use Illuminate\Http\Request;

interface ProductRepositoryInterface
{
    public function search(Request $request);
}
