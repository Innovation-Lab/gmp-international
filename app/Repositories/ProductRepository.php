<?php

namespace App\Repositories;

use App\Models\SalesProduct;
use App\Repositories\ProductRepositoryInterface;
use App\Services\SendMailService;
use Illuminate\Http\Request;


class ProductRepository implements ProductRepositoryInterface
{
    private SendMailService $sendMailService;
    
    /**
     * @param SendMailService $sendMailService
     */
    public function __construct(
        SendMailService $sendMailService
    ) {
        $this->sendMailService = $sendMailService;
    }
    
    /**
     * @param Request $request
     * @return mixed
     */
    public function search(Request $request): mixed
    {
        return SalesProduct::query()
            ->filter($request)
            ->keyword($request)
            ->whereNull('deleted_at');
    }
}
